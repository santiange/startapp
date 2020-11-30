<?php
	require_once "conexao.php";
	//print_r($_GET);
	$id_startup = $_GET["startup"];
	$query = "SELECT s.nome, e.nome AS nome_estado, c.nome AS nome_cidade, 
	razao_social,cnpj,segmento,endereco,cep, sigla,
	data_fundacao,numero_funcionarios, telefone,descricao, logotipo
	FROM startup AS s 
	INNER JOIN estados AS e
	ON s.estado = e.id_estado
	INNER JOIN cidades AS c
	ON c.id_cidade = s.cidade
	WHERE id_startup=$id_startup";
	
	//echo $query;exit;
	$executa = mysqli_query($conexao,$query);
	$dados = mysqli_fetch_array($executa);

	
	echo "		
		<p><img src='logotipos/$dados[logotipo]' width='35%'/></p>
		<p><b>Razão Social:</b>$dados[nome]</p>		
		<p>$dados[razao_social]</p>
		<p><b>CNPJ:</b>$dados[cnpj]</p>
		<p>$dados[segmento]</p>
		<p>$dados[endereco]</p>
		<p>$dados[cep]</p>
		<p><b>Cidade:</b>$dados[nome_cidade] - $dados[sigla]</p>	
		<p>$dados[data_fundacao]</p>	
		<p>$dados[numero_funcionarios]</p>	
		<p>$dados[telefone]</p>	
		<p>$dados[descricao]</p>	
	";
?>
	</table>