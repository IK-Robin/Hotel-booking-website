const features_form = document.getElementById('features_form');
const features_s_name = document.getElementById('features_s');
const feature_content  = document.getElementById('feature_content');


// add facilitiy code 
const facility_form = document.getElementById('facility_form');
const facility_s_name = document.getElementById('facility_name');
const fisilitydes = document.getElementById('fisilitydes');
const facility_icon = document.getElementById('facility_icon');

let xhr = new XMLHttpRequest();

const file_path ='feature_facility.php';


features_form.addEventListener('submit', (ev) => {
    ev.preventDefault();
    add_features();
    
});

function add_features() {
   

    let data = `feature_name=${features_s_name.value} &feature_sub`;

    xhrRequest(file_path, data, (data) => {
       if(data ==1){
        features_s_name.value = '';
        alerts('success','Feature update successfull');
        get_feature();
       }else{
        alerts('error','Something went wrong');
       }
    });
}


function delet_feature (val){
    let delet_f_item = `id=${val}`; 
    xhrRequest(file_path, delet_f_item, (data) => {
        if(data ==1){
            features_s_name.value = '';
            alerts('success','Feature delete successfull');
            get_feature();
           }else if(data== 'room_added') {
            alerts('error','This feature is already added in a room');
           }
           
           else{
            alerts('error','Something went wrong');
           }
    });
}


function get_feature(){
    xhrRequest(file_path,'get_features',data =>{
            feature_content.innerHTML = data;
    });
}
// get all feature on load 
get_feature();



// add facilitiy code 

facility_form.addEventListener('submit',(ev ) =>{
    ev.preventDefault();
    let form_data = new FormData(); 
    form_data.append('facility_name',facility_s_name.value);
    form_data.append('desc',fisilitydes.value);
    form_data.append('icon',facility_icon.files[0]);
    form_data.append('add_facility','')


    
    xhr.open('POST', './ajax/' + file_path, true);   
    
    xhr.onload= function() {
        if (this.responseText =='inv_img'){
            alerts("error","Invalid image format");
        }else if(this.responseText == 'inv_size'){
            alerts('error', 'Invalid image format max 2 MB')
        }else if(this.responseText =='upd_failed'){
            alerts('error', 'Failed to update');
        }else{
            alerts('success', 'Update successful' );
            // reset the form 

            facility_form.reset();
           
        }
    }

    xhr.send(form_data);

});



// show facility 


function show_facilites (){
    xhrRequest(file_path,'show_facilit',data =>{

    });
}










function xhrRequest(url, send, onloades) {
    xhr.open('POST', './ajax/' + url, true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    // Remove setting content type here, because it's not necessary when using FormData

    xhr.onload = function () {
        if (xhr.status == 200) {
            onloades(xhr.responseText);
        }
    }

    xhr.send(send);
}
 




