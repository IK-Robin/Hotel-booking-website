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
  const register_path = 'ajax/login_register.php';
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

// register user using from submit. 
const register_form = document.getElementById("register_form");

register_form.addEventListener('submit',ev =>{
  ev.preventDefault();

  // get from data  
  const register_formData = new FormData(register_form);

  register_formData.append('name',register_form.elements['name'].value);
  register_formData.append('email',register_form.elements['email'].value);
  register_formData.append('phone',register_form.elements['phone'].value);
 
  register_formData.append('pincode',register_form.elements['pincode'].value);
  register_formData.append('data_ofbarth',register_form.elements['data_ofbarth'].value);
  register_formData.append('password',register_form.elements['password'].value);
  register_formData.append('cpassword',register_form.elements['cpassword'].value);
  register_formData.append('formFile',register_form.elements['formFile'].files[0]);
  register_formData.append('register','');
  // hide bootstrap modal 
  const  myModal =  document.getElementById('registerModal');
  const modal = bootstrap.Modal.getInstance(myModal);
    modal.hide();
  let xhr = new XMLHttpRequest();
  xhr.open("POST",register_path,true);
 
  xhr.onload = function(){
    console.log(this.responseText);
  }
xhr.send(register_formData);

});





setActive();

</script>