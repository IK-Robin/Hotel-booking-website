
let xhr;
let data,contactUs;


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
    xhr.open('POST','./ajax/setting.php', true);
    
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
console.log(
    team_data
);
   team_data.forEach(item =>{
    
     html += `<div class="col-lg-3 mb-3">
          <div class="card">
              <img src="../images/about/${item.m_img}" class="card-img-top" alt="${item.m_img}">
              <div class="card-img-overlay text-end">
                      <button href="#" onclick="delete_members(${item.sr_no})" class="btn btn-danger btn-sm shadow-none"> <i  class="bi bi-trash"></i>Delete  </button>
              </div>
              <p class="card-text text-center text-light px-3 py-2 bg-dark">${item.name} </p>
             
              
          </div>
      </div>`;
    });
    document.getElementById('team_member_section').innerHTML = html;

    }

    xhr.send('get_picture');

}


// delete team member 

function delete_members(val){


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
