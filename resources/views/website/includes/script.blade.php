<script>
    showDepartments();
    function showDepartments() {
        var isSlider=$('#isSlider').val();
        if(isSlider == 'slider'){
            document.querySelector('.departments').classList.add('departments--opened');
        }else{
            document.querySelector('.departments').classList.remove('departments--opened');
        }
       
    }
</script>