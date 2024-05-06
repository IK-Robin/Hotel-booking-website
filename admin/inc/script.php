    <!-- bootstrap script  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    



    <script>

function alerts(type,message){

const  bs_class = (type =='success')? 'alert-success':'alert-warning';
let div  =document.createElement('div');

 div.innerHTML = `<div id="alert_close" class="alert custom_alert ${bs_class}   alert-dismissible fade show" role="alert">
        <strong class="me-3"> ${message}</strong>
     <button type="button" class="btn-close" data-bs-dismiss="alert shadow-none" aria-label="Close"></button>
</div>`;

document.body.append(div);
// hide the alerm after 3 sec 
setTimeout(function(){
    document.getElementById('alert_close').style.display = 'none';
},3000);

}
    </script>