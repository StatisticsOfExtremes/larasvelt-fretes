<script>

	import SelectVeiculos from './SelectVeiculos.svelte';
	import InputDonoVeiculo from './InputDonoVeiculo.svelte';
	
	let veiculo;
	
	let identificacaoMotorista;
	
	let nomeMotorista;
	
	let identificacaoDono;
	
	let nomeDono;
	
	let motoristaDono = false;
	
	let motoristaDonoCarreta = false;
	
	let identificacaoDonoCarreta;
	
	let nomeDonoCarreta;
</script>

<main>

	<form>

	<div>
		<h1> Carreteiro </h1>

		<div>
			<label for="nome">Nome:</label>
			<input type="text" id="nome" name="nome" bind:value={nomeMotorista}>
		</div>
		
		<div>
			<label for="cpf" >CPF:</label>
			<input type="text" id="cpf" name="cpf" bind:value={identificacaoMotorista}>
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
						<input type="radio" id="motorista-dono-sim" on:change={() => motoristaDono = !motoristaDono} value="true" name="motorista-dono">
					</div>
					
					<div>
						<label for="motorista-dono-n">Não</label>
						<input type="radio" id="motorista-dono-n" on:change={() => motoristaDono = !motoristaDono} value="false" name="motorista-dono" checked>
					</div>
			</div>
			<div>
				{#if motoristaDono == true}
				<div>				
					<label for="identificador-dono">CPF/CNPJ PROPRIETÁRIO<label>
					<input type="text" id="identificador-dono" name="identificador-dono" bind:value={identificacaoMotorista} readonly />
				</div>
				<div>
					<label for="nome-dono">NOME PROPRIETÁRIO<label>
					<input type="text" id="identificador-dono" name="identificador-dono" bind:value={nomeMotorista} readonly />
				</div>				
				{:else}
				<div>
					<label for="identificador-dono">CPF/CNPJ PROPRIETÁRIO<label>
					<input type="text" id="identificador-dono" name="identificador-dono" bind:value={identificacaoDono}/>
				</div>
				<div>
					<label for="nome-dono">NOME PROPRIETÁRIO<label>
					<input type="text" id="identificador-dono" name="identificador-dono" bind:value={nomeDono}/>
				</div>
				{/if}
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
			<!-- -->
			
			<div>
				Motorista é o dono?
				<div>
					<label for="motorista-dono-s">Sim</label>
					<input type="radio" id="motorista-dono-sim" on:change={() => motoristaDono = !motoristaDono} value="true" name="motorista-dono">
				</div>
				
				<div>
					<label for="motorista-dono-n">Não</label>
					<input type="radio" id="motorista-dono-n" on:change={() => motoristaDono = !motoristaDono} value="false" name="motorista-dono" checked>
				</div>
			</div>
			
				<div>
				{#if motoristaDono === true}
				<div>				
					<label for="identificador-dono">CPF/CNPJ PROPRIETÁRIO<label>
					<input type="text" id="identificador-dono" name="identificador-dono" bind:value={identificacaoMotorista} readonly />
				</div>
				<div>
					<label for="nome-dono">NOME PROPRIETÁRIO<label>
					<input type="text" id="identificador-dono" name="identificador-dono" bind:value={nomeMotorista} readonly />
				</div>				
				{:else}
				<div>
					<label for="identificador-dono">CPF/CNPJ PROPRIETÁRIO<label>
					<input type="text" id="identificador-dono" name="identificador-dono" bind:value={identificacaoDono}/>
				</div>
				<div>
					<label for="nome-dono">NOME PROPRIETÁRIO<label>
					<input type="text" id="identificador-dono" name="identificador-dono" bind:value={nomeDono}/>
				</div>
				{/if}
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
				Motorista é o dono da Carreta?
				<div>
					<label for="motorista-dono-s">Sim</label>
					<input type="radio" id="motorista-dono-sim" on:change={() => motoristaDonoCarreta = !motoristaDonoCarreta} value="true" name="motorista-dono-carreta">
				</div>
				
				<div>
					<label for="motorista-dono-n">Não</label>
					<input type="radio" id="motorista-dono-n" on:change={() => motoristaDonoCarreta = !motoristaDonoCarreta} value="false" name="motorista-dono-carreta" checked>
				</div>
			</div>
				<div>
				{#if motoristaDonoCarreta === true}
				<div>				
					<label for="identificador-dono">CPF/CNPJ PROPRIETÁRIO<label>
					<input type="text" id="identificador-dono" name="identificador-dono" bind:value={identificacaoMotorista} readonly />
				</div>
				<div>
					<label for="nome-dono">NOME PROPRIETÁRIO<label>
					<input type="text" id="identificador-dono" name="identificador-dono" bind:value={nomeMotorista} readonly />
				</div>				
				{:else}
				<div>
					<label for="identificador-dono">CPF/CNPJ PROPRIETÁRIO<label>
					<input type="text" id="identificador-dono" name="identificador-dono" bind:value={identificacaoDonoCarreta}/>
				</div>
				<div>
					<label for="nome-dono">NOME PROPRIETÁRIO<label>
					<input type="text" id="identificador-dono" name="identificador-dono" bind:value={nomeDonoCarreta}/>
				</div>
				{/if}
				</div>
		{/if}
	</form>
</main>	