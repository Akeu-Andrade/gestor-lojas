<?php

namespace App\Business;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Repository
 * @package App\Business
 */
abstract class Repository implements RepositoryInterface
{
    const WHERE_TAGS = 'In,Like';

    /**
     * @var Model|Builder
     */
    protected $model;

    /**
     * @param array $columns
     * @return Model
     */
    protected function create(array $columns): Model
    {
        return $this->model->create($columns);
    }

    /**
     * @param int $id
     * @param array $columns
     * @return Model
     */
    protected function update(int $id, array $columns): Model
    {
        $model = $this->find($id);
        $model->update($columns);
        return $model;
    }

    /**
     * @param int $id
     * @return $this|Model
     */
    public function find(int $id): Model
    {
        return $this->model->newQuery()->find($id);
    }

    /**
     * @param int $id
     * @return bool|null
     * @throws \Exception
     */
    public function delete(int $id): ?bool
    {
        return $this->find($id)->delete();
    }

    /**
     * @param array $filter
     * @return $this|RepositoryInterface
     * @throws \Exception
     */
    public function findBy(array $filter): RepositoryInterface
    {
        $tagsArray = explode(',', self::WHERE_TAGS);

        foreach ($filter as $column => $value) {
            if (empty($value) || $column == 'page') {
                continue;
            }

            $noTag = true;
            foreach ($tagsArray as $tag) {
                $type = strstr($column, $tag);
                if (empty($type)) {
                    continue;
                } else {
                    $str = strstr($column, $tag, true);
                    $chars = preg_split(
                        '/([[:upper:]][[:lower:]]+)/',
                        $str,
                        null,
                        PREG_SPLIT_DELIM_CAPTURE|PREG_SPLIT_NO_EMPTY
                    );
                    $column = strtolower(implode('_', $chars));

                    if ($type == 'In') {
                        if (!is_array($value)) {
                            throw new \Exception('Esse tipo de filtro só é permitido para variáveis do tipo array');
                        }
                        $where = 'where' . $type;
                        $this->model = $this->model->$where($column, $value);
                    }

                    if ($type == 'Like') {
                        $value = "%" . $value . "%";
                        $this->model = $this->model->where($column, $type, $value);
                    }
                    $noTag = false;
                    break;
                }
            }

            if ($noTag) {
                $where = 'where' . ucfirst($column);
                $this->model = $this->model->$where($value);
            }
        }

        return $this;
    }

    /**
     * @return Collection
     */
    public function get(): Collection
    {
        return $this->model->get();
    }

    /**
     * @param string $column
     * @param string|null $direction
     * @return $this|RepositoryInterface
     */
    public function order(string $column, string $direction = null): RepositoryInterface
    {
        if (empty($direction)) {
            $this->model = $this->model->orderBy($column);
        }

        $this->model = $this->model->orderBy($column, $direction);

        return $this;
    }

    /**
     * @param int $pages
     * @return LengthAwarePaginator
     */
    public function paginate(int $pages): LengthAwarePaginator
    {
        return $this->model->paginate($pages);
    }

    /**
     * @param int $limit
     * @return RepositoryInterface
     */
    public function limit(int $limit): RepositoryInterface
    {
        $this->model = $this->model->limit($limit);

        return $this;
    }
}
