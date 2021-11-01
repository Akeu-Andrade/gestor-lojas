<!-- ========================= FOOTER ========================= -->
<footer class="section-footer border-top bg">
    <div class="container">
        <section class="footer-top  padding-y">
            <div class="row">
                {{--                <aside class="col-md col-6">--}}
                {{--                    <h6 class="title">Marcas</h6>--}}
                {{--                    <ul class="list-unstyled">--}}
                {{--                        <li> <a href="#">Adidas</a></li>--}}
                {{--                        <li> <a href="#">Puma</a></li>--}}
                {{--                        <li> <a href="#">Reebok</a></li>--}}
                {{--                        <li> <a href="#">Nike</a></li>--}}
                {{--                    </ul>--}}
                {{--                </aside>--}}
                <aside class="col-md col-6">
                    <h6 class="title">Company</h6>
                    <ul class="list-unstyled">
                        <li><a href="#">About us</a></li>
                        <li><a href="#">Career</a></li>
                        <li><a href="#">Rules and terms</a></li>
                        <li><a href="#">Sitemap</a></li>
                    </ul>
                </aside>
                <aside class="col-md col-6">
                    <h6 class="title">Minha conta</h6>
                    <ul class="list-unstyled">
                        <li><a href="#"> Login </a></li>
                        <li><a href="#"> Register </a></li>
                        <li><a href="#"> Account Setting </a></li>
                    </ul>
                </aside>
                <aside class="col-md">
                    <h6 class="title">Social</h6>
                    <ul class="list-unstyled">
                        {!! !empty($loja->link_instagram) ? "<li><a href='$loja->link_instagram'> <i class='fab fa-instagram'></i> Instagram </a></li>" : '' !!}
                        {!! !empty($loja->link_facebook) ? "<li><a href='$loja->link_facebook'> <i class='fab fa-facebook'></i> Instagram </a></li>" : '' !!}
                        {!! !empty($loja->link_twitter) ? "<li><a href='$loja->link_twitter'> <i class='fab fa-twitter'></i> Instagram </a></li>" : '' !!}
                    </ul>
                </aside>
            </div> <!-- row.// -->
        </section>  <!-- footer-top.// -->
        <section class="footer-bottom row">
            <div class="col-md-2">
                <p class="text-muted"> {{now()->year}} {{$loja->nome}} </p>
            </div>
            <div class="col-md-8 text-md-center">
                <span class="px-2"> {{$loja->endereco}} </span>
            </div>
            <div class="col-md-2 text-md-right text-muted">
                <i class="fab fa-lg fa-cc-visa"></i>
                <i class="fab fa-lg fa-cc-paypal"></i>
                <i class="fab fa-lg fa-cc-mastercard"></i>
            </div>
        </section>
    </div><!-- //container -->
</footer>
<!-- ========================= FOOTER END // ========================= -->
