function deleteImage(map_id){
    $.ajax({
        type:"POST",
        //from where the root file is at
        url: "/backend_scripts/deletechallenge.php",
        data: "id=" + map_id,
        success: function(response){
            var modal = document.getElementById("modal_succ");
            var span = document.getElementsByClassName("close")[0];
            modal.style.display = "block";
         } 
    })
}