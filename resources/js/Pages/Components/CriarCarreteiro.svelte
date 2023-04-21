<script context="module">
    export {default as layout } from './Layout.svelte';
</script>

<script>
	import { Link, router } from '@inertiajs/svelte';
	import SelectVeiculos from './SelectVeiculos.svelte';

	let dados = {
		tipoVeiculo: '',
		placaVeiculo:null,
		anttVeiculo: null,
		telefoneMotorista: null,
		identificacaoMotorista: null,
		nomeMotorista: null,
		identificacaoDono: null,
		nomeDono: null,
		motoristaDono: false,
		motoristaDonoCarreta: false,
		identificacaoDonoCarreta: null,
		nomeDonoCarreta: null,
		placaCarreta: null,
		anttCarreta: null
	};

	const telPattern = "[0-9]{8}"

	const handleCarreteiro = (dados, motoristaDonoCarreta) => {
		 if (motoristaDonoCarreta) {
			dados['identificacaoDonoCarreta'] = dados['identificacaoMotorista']; 
			dados['nomeDonoCarreta'] = dados['nomeMotorista'];

			return dados;
		};

		return dados
	}

	function handleSubmit() {

		dados = handleCarreteiro(dados, dados.motoristaDonoCarreta)

		router.post('/carreteiros', dados);
	};
</script>

<main>
	<form on:submit|preventDefault={handleSubmit}>
		
	<div>
		<h1> Carreteiro </h1>
		
		<div>
			<label for="nome">Nome:</label>
			<input type="text" id="nome" name="nome" bind:value={dados.nomeMotorista}>
		</div>
		
		<div>
			<label for="cpf">CPF:</label>
			<input type="text" id="cpf" name="cpf" bind:value={dados.identificacaoMotorista}>
		</div>
		
		<div>
			<label for="telefone">Contato:</label>
			<input type="tel" id="telefone" name="telefone" pattern={telPattern} bind:value={dados.telefoneMotorista}>
		</div>
		
	</div>

	<div>
		<h1> Veículo </h1>

			<div>
				<label for="veiculos">Tipo de Veículo</label>
				<SelectVeiculos bind:value={dados.tipoVeiculo}/>
			</div>
			
			{#if dados.tipoVeiculo != "carreta"}
			<div>
				<label for="placa">PLACA</label>
				<input type="text" for="placa" bind:value={dados.placaVeiculo}/>
			</div>
			
			<div>
				<label for="modelo">MODELO</label>
				<input type="text" for="modelo" id="modelo"/>
			</div>
			
			<div>
				<label for="ANTT">ANTT</label>
				<input type="text" for="modelo" id="modelo" bind:value={dados.anttVeiculo}/>
			</div>
			
			<div>
				<div>
					Motorista é o dono?
					<div>
						<label for="motorista-dono-s">Sim</label>
						<input type="radio" id="motorista-dono-sim" on:change={() => dados.motoristaDono = !dados.motoristaDono} value="true" name="motorista-dono">
					</div>
					
					<div>
						<label for="motorista-dono-n">Não</label>
						<input type="radio" id="motorista-dono-n" on:change={() => dados.motoristaDono = !dados.motoristaDono} value="false" name="motorista-dono" checked>
					</div>
				</div>
				<div>
					{#if dados.motoristaDono == true}
					<div>
						<label for="identificador-dono">CPF/CNPJ PROPRIETÁRIO<label>
							<input type="text" id="identificador-dono" name="identificador-dono" bind:value={dados.identificacaoMotorista} readonly />
						</div>
						<div>
							<label for="nome-dono">NOME PROPRIETÁRIO<label>
								<input type="text" id="identificador-dono" name="identificador-dono" bind:value={dados.nomeMotorista} readonly />
							</div>
							{:else}
							<div>
								<label for="identificador-dono">CPF/CNPJ PROPRIETÁRIO<label>
					<input type="text" id="identificador-dono" name="identificador-dono" bind:value={dados.identificacaoDono}/>
				</div>
				<div>
					<label for="nome-dono">NOME PROPRIETÁRIO<label>
					<input type="text" id="identificador-dono" name="identificador-dono" bind:value={dados.nomeDono}/>
				</div>
				{/if}
			</div>
		</div>
		{:else}
		<div>
			<label for="placa">PLACA TRUCK </label>
			<input id="placa" bind:value={dados.placaVeiculo}>
		</div>
		
		<div>
			<label for="modelo">MODELO</label>
			<input type="text" for="modelo" id="modelo" bind:value={dados.modeloVeiculo}/>
		</div>
		
		<div>
			<label for="ANTT">ANTT</label>
			<input type="text" for="modelo" id="modelo" bind:value={dados.anttVeiculo}/>
		</div>
			<!-- -->

			<div>
				Motorista é o dono?
				<div>
					<label for="motorista-dono-s">Sim</label>
					<input type="radio" id="motorista-dono-sim" on:change={() => dados.motoristaDono = !dados.motoristaDono} value="true" name="motorista-dono">
				</div>
				
				<div>
					<label for="motorista-dono-n">Não</label>
					<input type="radio" id="motorista-dono-n" on:change={() => dados.motoristaDono = !dados.motoristaDono} value="false" name="motorista-dono" checked>
				</div>
			</div>
			
				<div>
				{#if dados.motoristaDono === true}

				<div>
					<label for="identificador-dono">CPF/CNPJ PROPRIETÁRIO<label>
						<input type="text" id="identificador-dono" name="identificador-dono" bind:value={dados.identificacaoMotorista} readonly />
					</div>
					<div>
						<label for="nome-dono">NOME PROPRIETÁRIO<label>
							<input type="text" id="identificador-dono" name="identificador-dono" bind:value={dados.nomeMotorista} readonly />
						</div>
				{:else}
				<div>
					<label for="identificador-dono">CPF/CNPJ PROPRIETÁRIO<label>
					<input type="text" id="identificador-dono" name="identificador-dono" bind:value={dados.identificacaoDono}/>
				</div>
				<div>
					<label for="nome-dono">NOME PROPRIETÁRIO<label>
						<input type="text" id="identificador-dono" name="identificador-dono" bind:value={dados.nomeDono}/>
					</div>
					{/if}
				</div>
				<hr />
				
				<div>
					<label for="placa-carreta">PLACA CARRETA </label>
					<input id="placa-carreta" bind:value={dados.placaCarreta}>
			</div>

			<div>
				<label for="modelo-carreta">MODELO CARRETA</label>
				<input type="text" for="modelo-carreta" id="modelo-carreta" bind:value={dados.modeloCarreta}/>
			</div>
			
			<div>
				<label for="ANTT">ANTT CARRETA</label>
				<input type="text" for="modelo-carreta" id="modelo-carreta" bind:value={dados.anttCarreta}/>
			</div>
			<div>
				Motorista é o dono da Carreta?
				<div>
					<label for="motorista-dono-s">Sim</label>
					<input type="radio" id="motorista-dono-sim" on:change={() => dados.motoristaDonoCarreta = !dados.motoristaDonoCarreta} value="true" name="motorista-dono-carreta">
				</div>
				
				<div>
					<label for="motorista-dono-n">Não</label>
					<input type="radio" id="motorista-dono-n" on:change={() => dados.motoristaDonoCarreta = !dados.motoristaDonoCarreta} value="false" name="motorista-dono-carreta" checked>
				</div>
			</div>
			<div>
				{#if dados.motoristaDonoCarreta === true}

				<div>
					<label for="identificador-dono">CPF/CNPJ PROPRIETÁRIO<label>
						<input type="text" id="identificador-dono" name="identificador-dono" bind:value={dados.identificacaoMotorista} readonly />
					</div>
					<div>
						<label for="nome-dono">NOME PROPRIETÁRIO<label>
							<input type="text" id="identificador-dono" name="identificador-dono" bind:value={dados.nomeMotorista} readonly />
						</div>
						{:else}
						<div>
							<label for="identificador-dono">CPF/CNPJ PROPRIETÁRIO<label>
								<input type="text" id="identificador-dono" name="identificador-dono" bind:value={dados.dentificacaoDonoCarreta}/>
							</div>
							<div>
								<label for="nome-dono">NOME PROPRIETÁRIO<label>
									<input type="text" id="identificador-dono" name="identificador-dono" bind:value={dados.nomeDonoCarreta}/>
								</div>
								{/if}
			</div>
		{/if}
		<button type="submit" as="button">CRIAR</button>
	</form>

</main>