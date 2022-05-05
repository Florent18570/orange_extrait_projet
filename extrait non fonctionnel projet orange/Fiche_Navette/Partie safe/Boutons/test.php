
<div class="container">
    <h1> Faire un toggle en JS </h1>
    <hr>
    <button class="button">toggle</button>
    <p class="text"> c'est un teste </p>
    </div>

<style>

.text{
    opacity: 0;
    visibility : hidden ; 
    transition: opacity 0.5s ease-in-out,visibility 0.5s ease-in-out
}

.text.is-visible{
    opacity: 1;
    visibility:visible;
}


</style>




<script> 

const btn = document.querySelector('button');
const text = document.querySelector('.text');

let isVisible = false;

btn.addEventListener('click',() => {
    isVisible = !isVisible;
    isVisible ? text.classList.add('is-visible') :text.classList.remove('is-visible');
});

</script>


<TD>
<form action="tempon_supression_habilitation.php" method="post">
      <input type="hidden" name="Application" value="<?php echo $evenement3["Application"] ?>">
      
 <input type="submit" class="button is-danger"  style="height:35px;float: right;" value="X">
      
        </form>
        </TD>