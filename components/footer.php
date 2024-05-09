<div class="container-fluid mt-4">
      <div class="row bg-dark">
        <div class="col-lg-4 col mb-4 text-white p-4">
          <h1 class="merinda">HAMJAIU</h1>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem ipsa placeat qui hic? Esse, ducimus.</p>
        </div>
        <div class="col-lg-4 col mb-4 text-white p-4">
          <h5 class="">Quick links</h5>
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Rooms</a>
            </li>

            <li class="nav-item">
                <a class="nav-link " href="#">Facilities</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="#">Contact Us</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="#"> About Us</a>
            </li>
        </ul>
        </div>
        <div class="col-lg-4 col mb-4 text-white p-4">
         
          <h5>Follow Us</h5>
          <a
            class="d-inline-block text-decoration-none text-white mt-2"
            href="tel:+01626699"
          >
            <i class="bi bi-twitter-x pe-1"></i>Twitter
          </a><br>
          <a
            class="d-inline-block text-decoration-none text-white mt-2"
            href="tel:+01626699"
          >
            <i class="bi bi-facebook pe-1"></i>Facebook
          </a><br>

          <a
            class="d-inline-block text-decoration-none text-white mt-2"
            href="tel:+01626699"
          >
          <i class="bi bi-linkedin pe-1"></i> Linkdin</a
          >
        </div>
        
      </div>
    </div>

    <!-- bootstrap script  -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<script>
function setActive(){
  const navbers = document.getElementById('navbers');
const a_tags = navbers.getElementsByTagName('a');
for (let i = 0; i < a_tags.length; i++) {
  let file = a_tags[i].pathname.split('/').pop();
  let file_name = file.split('.')[0];
  if(document.location.href.indexOf(file_name) >=0){
    a_tags[i].classList.add('active');
  }
}
}

setActive();

</script>