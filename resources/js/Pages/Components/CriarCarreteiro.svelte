<script context="module">
    export {default as layout } from './Layout.svelte';
</script>

<script>
	import { Link, router } from '@inertiajs/svelte';
	import SelectVeiculos from './SelectVeiculos.svelte';
	
	let motoristaDono = false; 
	let motoristaDonoCarreta =  false;
	
	let dados = {
		veiculo : {
			tipo: '',
			placa:null,
			antt: null,
			modelo: null,
			dono : {
				identificacao: null,
				nome: null,
			}
		},
		motorista : {
			identificacao: null,
			nome: null,
			telefone: null,
		},
		carreta : {
			placa: null,
			anttCarreta: null,
			modelo: null,
			dono : {
				nome: null,
				identificacao : null
			}
		}
	};

	const telPattern = "[9]?[0-9]{8}"

	const handleDono = () => {
		if (motoristaDono) {
			dados.veiculo.dono.nome = dados.motorista.nome;
			dados.veiculo.dono.identificacao = dados.motorista.identificacao;
			return;
		}
		dados.veiculo.dono.nome = null;
		dados.veiculo.dono.identificacao = null;
	}

	const handleCarreteiro = (dados, motoristaDonoCarreta) => {
		 if (motoristaDonoCarreta) {
			[dados.carreta.dono] = dados.veiculo.dono;
			return dados;
		};

		return dados
	}

	function handleSubmit() {

		dados = handleCarreteiro(dados, motoristaDonoCarreta)
		
		handleDono(dados)

		router.post('/carreteiros', dados);
	};
</script>

<main>
	<form on:submit|preventDefault={handleSubmit}>
		
	<div>
		<h1> Carreteiro </h1>
		
		<div>
			<label for="nome">Nome:</label>
			<input type="text" id="nome" name="nome" bind:value={dados.motorista.nome}>
		</div>
		
		<div>
			<label for="cpf">CPF:</label>
			<input type="text" id="cpf" name="cpf" bind:value={dados.motorista.identificacao}>
		</div>
		
		<div>
			<label for="telefone">Contato:</label>
			<input type="tel" id="telefone" name="telefone" pattern={telPattern} bind:value={dados.motorista.telefone}>
		</div>
		
	</div>
''
	<div>
		<h1> Veículo </h1>

			<div>
				<label for="veiculos">Tipo de Veículo</label>
				<SelectVeiculos bind:veiculo={dados.veiculo.tipo}/>
			</div>
			
		{#if dados.veiculo.tipo != "carreta"}
			<div>
				<label for="placa">PLACA</label>
				<input type="text" for="placa" bind:value={dados.veiculo.placa}/>
			</div>
			
			<div>
				<label for="modelo">MODELO</label>
				<input type="text" for="modelo" id="modelo" bind:value={dados.veiculo.modelo}/>
			</div>
			
			<div>
				<label for="ANTT">ANTT</label>
				<input type="text" for="modelo" id="modelo" bind:value={dados.veiculo.antt}/>
			</div>
			
			<div>
				<div>
					Motorista é o dono?
					<div>
						<label for="motorista-dono-s">Sim</label>
						<input type="radio" id="motorista-dono-sim" on:change={() => motoristaDono = !motoristaDono} on:change={handleDono()} value="true" name="motorista-dono">
					</div>
					
					<div>
						<label for="motorista-dono-n">Não</label>
						<input type="radio" id="motorista-dono-n" on:change={() => motoristaDono = !motoristaDono} on:change={handleDono()} value="false" name="motorista-dono" checked>
					</div>
				</div>
				<div>
					{#if motoristaDono == true}
					<div>
						<label for="identificador-dono">CPF/CNPJ PROPRIETÁRIO<label>
							<input type="text" id="identificador-dono" name="identificador-dono" bind:value={dados.motorista.identificacao} readonly />
						</div>
						<div>
							<label for="nome-dono">NOME PROPRIETÁRIO<label>
							<input type="text" id="identificador-dono" name="identificador-dono" bind:value={dados.motorista.nome} readonly />
						</div>
					{:else}
					<div>
						<label for="identificador-dono">CPF/CNPJ PROPRIETÁRIO<label>
						<input type="text" id="identificador-dono" name="identificador-dono" bind:value={dados.veiculo.dono.identificacao}/>
					</div>
					<div>
						<label for="nome-dono">NOME PROPRIETÁRIO<label>
						<input type="text" id="identificador-dono" name="identificador-dono" bind:value={dados.veiculo.dono.nome}/>
					</div>
				{/if}
			</div>
		</div>
		{:else}
		<div>
			<label for="placa">PLACA TRUCK </label>
			<input id="placa" bind:value={dados.veiculo.placa}>
		</div>
		
		<div>
			<label for="modelo">MODELO</label>
			<input type="text" for="modelo" id="modelo" bind:value={dados.veiculo.modelo}/>
		</div>
		
		<div>
			<label for="ANTT">ANTT</label>
			<input type="text" for="modelo" id="modelo" bind:value={dados.veiculo.antt}/>
		</div>
			<!-- -->

			<div>
				Motorista é o dono?
				<div>
					<label for="motorista-dono-s">Sim</label>
					<input type="radio" id="motorista-dono-sim" value="true" name="motorista-dono">
				</div>
				
				<div>
					<label for="motorista-dono-n">Não</label>
					<input type="radio" id="motorista-dono-n" value="false" name="motorista-dono" checked>
				</div>
			</div>
			
				<div>
				{#if motoristaDono === true}

				<div>
					<label for="identificador-dono">CPF/CNPJ PROPRIETÁRIO<label>
						<input type="text" id="identificador-dono" name="identificador-dono" bind:value={dados.motorista.identificacao} on:change={(e) => console.log(e)} />
					</div>
					<div>
						<label for="nome-dono">NOME PROPRIETÁRIO<label>
							<input type="text" id="identificador-dono" name="identificador-dono" bind:value={dados.motorista.nome} on:change={() => dados.veiculo.dono.nome = dados.motorista.nome} readonly />
						</div>
				{:else}
				<div>
					<label for="identificador-dono">CPF/CNPJ PROPRIETÁRIO<label>
					<input type="text" id="identificador-dono" name="identificador-dono" bind:value={dados.veiculo.dono.identificacao}/>
				</div>
				<div>
					<label for="nome-dono">NOME PROPRIETÁRIO<label>
						<input type="text" id="identificador-dono" name="identificador-dono" bind:value={dados.veiculo.dono.nome}/>
					</div>
					{/if}
				</div>
				<hr />
				
				<div>
					<label for="placa-carreta">PLACA CARRETA </label>
					<input id="placa-carreta" bind:value={dados.carreta.placa}>
			</div>

			<div>
				<label for="modelo-carreta">MODELO CARRETA</label>
				<input type="text" for="modelo-carreta" id="modelo-carreta" bind:value={dados.carreta.modelo}/>
			</div>
			
			<div>
				<label for="ANTT">ANTT CARRETA</label>
				<input type="text" for="modelo-carreta" id="modelo-carreta" bind:value={dados.carreta.antt}/>
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
						<input type="text" id="identificador-dono" name="identificador-dono" bind:value={dados.motorista.identificacao} readonly />
					</div>
					<div>
						<label for="nome-dono">NOME PROPRIETÁRIO<label>
							<input type="text" id="identificador-dono" name="identificador-dono" bind:value={dados.motorista.nome} readonly />
						</div>
						{:else}
						<div>
							<label for="identificador-dono">CPF/CNPJ PROPRIETÁRIO<label>
								<input type="text" id="identificador-dono" name="identificador-dono" bind:value={dados.carreta.dono.identificacao}/>
							</div>
							<div>
								<label for="nome-dono">NOME PROPRIETÁRIO<label>
									<input type="text" id="identificador-dono" name="identificador-dono" bind:value={dados.veiculo.dono.nome}/>
								</div>
								{/if}
			</div>
		{/if}
		<button type="submit" as="button">CRIAR</button>
	</form>

</main>