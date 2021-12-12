<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
		<script type="text/javascript">
			if (localStorage.getItem('acc')==='livreur') 
			{
				Swal.fire({
				  icon: 'success',
				  title: 'Votre inscription a été enregistrée avec succès. Vous serez redirigé vers votre Espace.',
				  showConfirmButton: true,
				  timer: 5000
				}).then((result)=>
				  {
				   	  console.log(result.isConfirmed);
				  });
				setTimeout(function() {window.location = './livreur/';},5000);
				localStorage.removeItem('acc');
			}
			/*if (localStorage.getItem('acc')==='client') 
			{
				Swal.fire({
				  icon: 'success',
				  title: 'Votre inscription a été enregistrée avec succès. Vous serez redirigé vers votre Espace.',
				  showConfirmButton: false,
				  timer: 5000
						  });
				setTimeout(function() {window.location = './Client/';},5000);
				localStorage.removeItem('acc');
			}*/
		</script>
</html>