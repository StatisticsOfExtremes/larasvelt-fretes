<script>

	import SelectVeiculos from './SelectVeiculos.svelte';
	
	let veiculo;
	
	let carretasCount = 0;
	
	console.log(veiculo);
</script>

<main>

	<form>

	<div>
		<h1> Carreteiro </h1>

		<div>
			<label for="nome"> Nome:</label>
			<input type="text" id="nome" name="nome">
		</div>
		
		<div>
			<label for="cpf"> CPF:</label>
			<input type="text" id="cpf" name="cpf">
		</div>
		
		<div>
			<label for="telefone"> Contato:</label>
			<input type="tel" id="telefone" name="telefone"  pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}">
		</div>
	</div>
	
	<div>
		<h1> Veículo </h1>
		
			<div>
				<label for="veiculos">Tipo de Veículo</label>
				<SelectVeiculos bind:this={veiculo}/>
			</div>
			
		{#if veiculo != "carreta"}
			<div>
				<label for="placa">PLACA TOCO</label>
				<input type="text" for="placa">
			</div>
		{/if}
		{#if veiculo === "carreta"}
			<div>
				<label for="placa-carreta"> PLACA CARRETA </label>
				<input id="placa-carreta">
			</div>
		{/if}
	</form>
</main>	