
let xhr;
let data,contactUs;

function booking_get_xhr(url) {
    xhr = new XMLHttpRequest();
    xhr.open('POST', './ajax/carosal_c.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
}

// add member section 
const add_carosal = document.getElementById('add_carosal');

const add_carosal_img = document.getElementById('add_carosal_img');


add_carosal.addEventListener('submit',(ev) =>{
    ev.preventDefault();
   
    add_pictures();
}); 
function add_pictures (){
    let data = new FormData();

    data.append('pitcure',add_carosal_img.files[0]);
    data.append('add_carosal','');
    let xhr = new XMLHttpRequest();
    xhr.open('POST','./ajax/carosal_c.php', true);
    
    xhr.onload= function() {
        if (this.responseText =='inv_img'){
            alerts("error","Invalid image format");
        }else if(this.responseText == 'inv_size'){
            alerts('error', 'Invalid image format max 2 MB')
        }else if(this.responseText =='upd_failed'){
            alerts('error', 'Failed to update');
        }else{
            alerts('success', 'Update successful' );


            add_carosal_img.value ='';
            show_picture_carosal();
        }
    }

    xhr.send(data);
}




// show all manage teem member 

function show_picture_carosal(){
    booking_get_xhr();


    let html ="";
    xhr.onload = function(){
//    team_data = Object.values( this.responseText);
let team_data =JSON.parse(this.responseText);

   team_data.forEach(item =>{
    
     html += `<div class="col-lg-3 mb-3">
          <div class="card">
              <img src="../images/carousel/${item.carosal_img}" class="card-img-top" alt="${item.carosal_img}">
              <div class="card-img-overlay text-end">
                      <button href="#" onclick="delete_carosal(${item.sr_no})" class="btn btn-danger btn-sm shadow-none"> <i  class="bi bi-trash"></i>Delete  </button>
              </div>
              
             
              
          </div>
      </div>`;
    });
    document.getElementById('carosal_img_section').innerHTML = html;

    }

    xhr.send('get_picture');

}


// delete team member 

function delete_carosal(val){


    booking_get_xhr();

    xhr.onload =function (){ 
        console.log(this.responseText);
        show_picture_carosal();
    }

    xhr.send('delete_picture=' + val);

}


window.addEventListener('load',() =>{
   
    show_picture_carosal();
});
