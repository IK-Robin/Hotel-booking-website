    <!-- bootstrap script  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    



    <script>
function alerts(type, message) {
    const bs_class = (type == 'success') ? 'alert-success' : 'alert-warning';
    let div = document.createElement('div');

    div.innerHTML = `<div id="alert_close" class="alert ${bs_class} custom_alert alert-dismissible ${message} fade show" role="alert">
    <strong class="me-3"> ${message}</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>`;
    document.body.append(div);
    
    // Remove the alert after 1 second
    setTimeout(function () {
        div.remove();
    }, 1000);
}

</script>
