const room_data = document.getElementById('room_data');
const checkout_date = document.getElementById('checkout_date');
const checkin_date = document.getElementById('checkin_date');
const pre_loader = document.getElementById('pre_loader');


const file_path = './admin/ajax/room_filter.php';
// feacth room data usning ajax 
function featch_rooms(){
    const check_aval = JSON.stringify({
        checkin_date : checkin_date.value,
        checkout_date : checkout_date.value,
    })

    let xhr = new XMLHttpRequest();
    xhr.open('GET', file_path+`?featch_rooms&check_aval=${check_aval}`, true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');


    xhr.onload = function(){
        if(this.status == 200){
            room_data.innerHTML = this.responseText;
        }
    }
    xhr.onprogress = function () {
        room_data.innerHTML =` <div class="spinner-border text-primary text-center  mb-3" role="status" >
        <span class="visually-hidden">Loading...</span>
      </div>`;
    }
    xhr.send();
}



function check_room_aval (){
    
    if(checkin_date.value !='' && checkout_date.value !=''){
    featch_rooms();
    //  check room avable or not 
      
    }
}

featch_rooms();