const site_address = document.getElementById('site_address');
const site_title = document.getElementById('site_title');
const general_from = document.getElementById('genereal_from');
console.log(site_title);
const site_address_inp = document.getElementById('site_address_inp');
const site_title_inp = document.getElementById('site_title_inp');
const general_close = document.getElementById('general_close');
const generel_submit = document.getElementById('generel_submit');

// Define the XHR object globally
let xhr;

// Define booking_get_xhr function globally
function booking_get_xhr(url) {
    xhr = new XMLHttpRequest();
    xhr.open('POST', './ajax/setting.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
}

general_close.addEventListener('click', (ev) => {
    site_address_inp.value = data.site_address;
    site_title_inp.value = data.site_name;
});

function get_general_data() {
    booking_get_xhr();
    
    xhr.send('getgenerel');
    xhr.onload = function() {
        data = JSON.parse(this.responseText);
        console.log(data);
        site_address.innerText = data.site_address;
        site_title.innerText = data.site_name;
        site_address_inp.value = data.site_address;
        site_title_inp.value = data.site_name;
    }
}
// update the data 

generel_submit.addEventListener('click',()=>{

general_data_update(site_title_inp.value,site_address_inp.value
)

get_general_data();
});

function general_data_update(site_title, site_address){
booking_get_xhr();
xhr.send('stie_title='+site_title+'&site_address='+site_address+'&generel_submit');

xhr.onload = function (){
    if (this.responseText == 1) {
         alerts('success', 'Data update Successfull');
         get_general_data();
    }else{
        alerts('error', 'Data update Failed');
    }
}





}

window.onload = get_general_data;
