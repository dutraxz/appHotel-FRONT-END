export default function RoomCard() {
    const room = document.createElement('div');
    room.className = 'card';
        /*Incorporar os elementos HTML do bootstrap para navbar*/
        room.innerHTML = `
        <div class="card" style="width: 20rem;">
        <div id="carouselExample" class="carousel slide">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="public/assets/images/hotel1.png" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="public/assets/images/hlhotel.png  " class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="public/assets/images/quarto.jpg" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
  <div class="card-body">
    <h5 class="card-title">Reserve um quarto!</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card’s content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>`;

        return room;
}