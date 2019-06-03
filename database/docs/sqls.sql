https://fontawesome.com/v4.7.0/icons/

UPDATE banks SET nome_banco = UPPER(nome_banco);
INSERT INTO financial.banks (cod_banco, nome_banco, created_at, updated_at) 
SELECT cod_banco, nome_banco, NOW(), NOW() FROM financeiro.tb_banco;