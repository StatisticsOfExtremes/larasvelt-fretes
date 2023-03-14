<script>

export let motoristaDono;

export let identificacaoMotorista;

export let nomeMotorista;

export let nomeDono;

export let identificacaoDono;


console.log(nomeDono, identificacaoDono);
</script>

{#if motoristaDono === 'true'}
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