export default function Footer() {
  const rodape = document.createElement('div');

  rodape.innerHTML =
    `<!-- Footer -->
<footer class="text-center text-lg-start bg-body-tertiary text-muted">
  <!-- Section: Social media -->
  <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
    <!-- Left -->
    <div class="me-5 d-none d-lg-block">
      <span>Get connected with us on social networks:</span>
    </div>
    <!-- Left -->

    <!-- Right -->
    <div>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-facebook-f"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-twitter"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-google"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-instagram"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-linkedin"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-github"></i>
      </a>
    </div>
    <!-- Right -->
  </section>
  <!-- Section: Social media -->

  <!-- Section: Links  -->
  <section class="">
    <div class="container text-center text-md-start mt-5">
      <!-- Grid row -->
      <div class="row mt-3">
        <!-- Grid column -->
        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
          <!-- Content -->
          <h6 class="text-uppercase fw-bold mb-4">
            <i class="fas fa-gem me-3"></i>N O V O T E L
          </h6>
          <p>
            Proporcionamos uma experiência incrivel e encantadora para todos nossos clientes.
            Venha conhecer um pouco mais sobre a gente! ->
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
          Universo NOVOTEL
          </h6>
          <p>
            <a href="#!" class="text-reset">Quem somos?</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Localizações</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Empresas Parceiras</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Nossos Produtos</a>
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
            Conheça sobre a gente
          </h6>
          <p>
            <a href="#!" class="text-reset">Instagram</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Facebook</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Hotéis</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Ajuda</a>
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">Contatos</h6>
          <p><i class="fas fa-home me-3"></i> Sorocaba, SP - 18034-009, BR </p>
          <p>
            <i class="fas fa-envelope me-3"></i>
            novotel@outlook.com
          </p>
          <p><i class="fas fa-phone me-3"></i> +55 15 56788-009</p>
          <p><i class="fas fa-print me-3"></i> +55 15 56789-009</p>
        </div>
        <!-- Grid column -->
      </div>
      <!-- Grid row -->
    </div>
  </section>
  <!-- Section: Links  -->

  <!-- Copyright -->
  <div class="text-center p-4" style="background-co lor: rgba(255, 0, 0, 0.05);">
    © 2025 Copyright - Direitos Reservados:
    <a class="text-reset fw-bold" href="https://novotel.com.br/">novotel.com.br</a>
  </div>
  <!-- Copyright -->
</footer>
<!-- Footer -->`

  return rodape;

}
