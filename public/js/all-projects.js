function catName(catName) {

  $('.cat_name').val(catName);

    categoryProduct = categoryProducts.replace(':cat_name', catName);  
    $.ajax({
        type:'GET',
        url:categoryProduct,
        success:function(data){
          console.log(data);
        }
     });
  }
// $(document).ready(function(){
//     e.preventDefault();
//     var catName = $('.cat_name').val();
// })