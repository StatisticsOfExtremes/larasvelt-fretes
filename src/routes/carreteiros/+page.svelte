<script>

	import SelectVeiculos from './SelectVeiculos.svelte';
	import InputDonoVeiculo from './InputDonoVeiculo.svelte';
	
	let veiculo;
	
	let identificacaoMotorista;
	
	let identificacaoDono = '';
	
	let nomeDono = '';
	
	let motoristaDono = false;
	
	function changeBool(e) {
		motoristaDono = e.target.value;
		console.log(motoristaDono);
	};
	
	
</script>

<main>

	<form>

	<div>
		<h1> Carreteiro </h1>

		<div>
			<label for="nome">Nome:</label>
			<input type="text" id="nome" name="nome">
		</div>
		
		<div>
			<label for="cpf" >CPF:</label>
			<input bind:value={identificacaoMotorista} type="text" id="cpf" name="cpf">
		</div>
		
		<div>
			<label for="telefone">Contato:</label>
			<input type="tel" id="telefone" name="telefone"  pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}">
		</div>
		
	</div>
	
	<div>
		<h1> Veículo </h1>
		
			<div>
				<label for="veiculos">Tipo de Veículo</label>
				<SelectVeiculos bind:veiculo/>
			</div>
			
		{#if veiculo != "carreta"}
			<div>
				<label for="placa">PLACA</label>
				<input type="text" for="placa"/>
			</div>
			
			<div>
				<label for="modelo">MODELO</label>
				<input type="text" for="modelo" id="modelo"/>
			</div>
			
			<div>
				<label for="ANTT">ANTT</label>
				<input type="text" for="modelo" id="modelo"/>
			</div>
			
			<div>
			<div>
					Motorista é o dono?
					<div>
						<label for="motorista-dono-s">Sim</label>
						<input type="radio" id="motorista-dono-sim" on:change={e => changeBool(e)} value="true" name="motorista-dono">
					</div>
					
					<div>
						<label for="motorista-dono-n">Não</label>
						<input type="radio" id="motorista-dono-n" on:change={e => changeBool(e)} value="false" name="motorista-dono" checked>
					</div>
			</div>
			<div>
				<InputDonoVeiculo motoristaDono identificacaoMotorista nomeMotorista bind:identificacaoDono bind:nomeDono/>
			</div>
			</div>
		{:else}
			<div>
				<label for="placa">PLACA TRUCK </label>
				<input id="placa">
			</div>
			
			<div>
				<label for="modelo">MODELO</label>
				<input type="text" for="modelo" id="modelo"/>
			</div>
			
			<div>
				<label for="ANTT">ANTT</label>
				<input type="text" for="modelo" id="modelo"/>
			</div>

			<div>
				Motorista é o dono?
				<div>
					<label for="motorista-dono-s">Sim</label>
					<input type="radio" id="motorista-dono-sim" on:change={e => changeBool(e)} value="true" name="motorista-dono">
				</div>
				
				<div>
					<label for="motorista-dono-n">Não</label>
					<input type="radio" id="motorista-dono-n" on:change={e => changeBool(e)} value="false" name="motorista-dono" checked>
				</div>
			</div>
			
			<hr />
			
			<div>
				<label for="placa-carreta">PLACA CARRETA </label>
				<input id="placa-carreta">
			</div>
			
			<div>
				<label for="modelo-carreta">MODELO CARRETA</label>
				<input type="text" for="modelo-carreta" id="modelo-carreta"/>
			</div>
			
			<div>
				<label for="ANTT">ANTT CARRETA</label>
				<input type="text" for="modelo-carreta" id="modelo-carreta"/>
			</div>
			<div>
				Motorista é o dono?
				<div>
					<label for="motorista-dono-s">Sim</label>
					<input type="radio" id="motorista-dono-sim" on:change={e => changeBool(e)} value="true" name="motorista-dono-carreta">
				</div>
				
				<div>
					<label for="motorista-dono-n">Não</label>
					<input type="radio" id="motorista-dono-n" on:change={e => changeBool(e)} value="false" name="motorista-dono-carreta" checked>
				</div>
			</div>
		{/if}
	</form>
</main>	