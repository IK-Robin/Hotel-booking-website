const room_data = document.getElementById('room_data');
const checkout_date = document.getElementById('checkout_date');
const checkin_date = document.getElementById('checkin_date');
const pre_loader = document.getElementById('pre_loader');
const reset_avail = document.getElementById('reset_avail');
const fil_feature = document.getElementById('fil_feature');
const fil_facility = document.getElementById('fil_facility');



// guest section 
const children = document.getElementById('children');
const audalt = document.getElementById('audalt');
const guest_resetb = document.getElementById('guest_reset');


const file_path = './admin/ajax/room_filter.php';
// feacth room data usning ajax 
function featch_rooms(){
    const check_aval = JSON.stringify({
        checkin_date : checkin_date.value,
        checkout_date : checkout_date.value,
    });

    const guest_val = JSON.stringify({
        audalt:audalt.value, 
        children:children.value, 
    });

    // get all facility 
    const facility = document.querySelectorAll('[name="facilitys"]:checked');
   
    let facilities_list = {"facilites_list":[]};
    if( facility.length > 0 ){
    facility.forEach((item) => {
            facilities_list.facilites_list.push(item.value);
        });
    }
   facilities_list = JSON.stringify(facilities_list);


    // get all features  
    const feature_lists = document.querySelectorAll('[name="feature"]:checked');
   
    let feature_list = {"feature_list":[]};
    if( feature_lists.length > 0 ){
        feature_lists.forEach((item) => {
            feature_list.feature_list.push(item.value);
        });
    }
   feature_list = JSON.stringify(feature_list);


    let xhr = new XMLHttpRequest();
    xhr.open('GET', file_path+`?featch_rooms&check_aval=${check_aval}&guest_filter=${guest_val} &facility_list=${facilities_list} &feature_list=${feature_list}`, true);

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
    reset_avail.classList.add('d-block');
    reset_avail.classList.remove('d-none');
    if(checkin_date.value !='' && checkout_date.value !=''){
    featch_rooms();
    //  check room avable or not 
      
    }
}


// clear date valeu 
function clear_date(){
    checkin_date.value = '';
   checkout_date.value = '';
   reset_avail.classList.remove('d-block');
   reset_avail.classList.add('d-none');
   featch_rooms();
}



function guest_filter (){
    guest_resetb.classList.add('d-block');
    guest_resetb.classList.remove('d-none');
    if(children.value > 0 || audalt.value > 0 ) {
        featch_rooms();
    }
}

function clear_guest(){
    children.value = '';
    audalt.value = '';
    guest_resetb.classList.add('d-block');
    guest_resetb.classList.remove('d-none');
    featch_rooms();

}



function filter_facility (){
    fil_facility.classList.add('d-block');
    fil_facility.classList.remove('d-none');
    featch_rooms();
}



function clerar_facility(){
    // get all facility using there name 


    const facilities = document.querySelectorAll('[name="facilitys"]:checked');

    for (let i = 0; i < facilities.length; i++) {
        facilities[i].checked = false;
    }
    // toggle the cliass list 'd-block'
   
    fil_facility.classList.remove('d-block');
    fil_facility.classList.add('d-none');
}

// check facility filter section 
function check_features () {
    fil_feature.classList.add('d-block');
    fil_feature.classList.remove('d-none');
    featch_rooms();
}

function clear_featuer(){
    // get all facility using there name 


    const feature = document.querySelectorAll('[name="feature"]:checked');

    for (let i = 0; i < feature.length; i++) {
        feature[i].checked = false;
    }
    // toggle the cliass list 'd-block'
   
    fil_feature.classList.remove('d-block');
    fil_feature.classList.add('d-none');
}

window.onload(featch_rooms());