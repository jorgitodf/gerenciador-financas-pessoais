SET autocommit = 1;
START TRANSACTION;

INSERT INTO financial.banks (cod_banco, nome_banco, created_at, updated_at)
SELECT cod_banco, nome_banco, NOW(), NOW() FROM financeiro.tb_banco;

INSERT INTO financial.flag_cards (id, bandeira, created_at, updated_at)
SELECT id_bandeira_cartao AS id, bandeira, NOW() AS created_at, NOW() AS updated_at FROM financeiro.tb_bandeira_cartao;

INSERT INTO financial.categories (id, nome_categoria, despesa_fixa, tipo, created_at, updated_at) 
SELECT id_categoria, nome_categoria, despesa_fixa, tipo, NOW(), NOW() FROM financeiro.tb_categoria;

INSERT INTO financial.credit_cards (numero_cartao, data_validade, flag_card_id, user_id, bank_id, ativo, dia_pgto_fatura, created_at, updated_at)
SELECT numero_cartao, data_validade, fk_id_bandeira_cartao, fk_id_usuario, fk_cod_banco, ativo, dia_pgto_fatura, NOW(), NOW() FROM financeiro.tb_cartao_credito;

INSERT INTO financial.scheduled_payments (data_pagamento, movimentacao, valor, pago, category_id, account_id, created_at, updated_at) 
SELECT data_pagamento, movimentacao, valor, pago, fk_id_categoria, fk_id_conta, NOW(), NOW() FROM financeiro.tb_pgto_agendado;

INSERT INTO financial.extracts (data_movimentacao, mes, tipo_operacao, movimentacao, quantidade, valor, saldo, category_id, account_id, despesa_fixa, created_at, updated_at)
SELECT data_movimentacao, mes, tipo_operacao, movimentacao, quantidade, valor, saldo, fk_id_categoria, fk_id_conta, despesa_fixa, NOW(), NOW() FROM financeiro.tb_extrato;

INSERT INTO financial.invoice_cards (data_pagamento_fatura, encargos, protecao_premiada, iof, pago, anuidade, juros, valor_total_fatura, valor_pagamento_fatura, ano_mes_ref, restante_fatura_mes_anterior, data_fechamento_fatura, credit_card_id, created_at, updated_at)
SELEct data_vencimento_fatura, encargos, protecao_premiada, iof, pago, anuidade, juros, valor_total_fatura,  valor_pago, ano_mes_ref, restante_fatura_anterior, data_fechamento_fatura, fk_id_cartao_credito, NOW(), NOW() FROM financeiro.tb_fatura_cartao;

INSERT INTO financial.expense_cards (descricao, data_compra, credit_card_id, created_at, updated_at)
SELECT despesa, data_compra, fk_id_cartao_credito, NOW(), NOW() FROM financeiro.tb_despesa_cartao  WHERE fk_id_cartao_credito = 3;

COMMIT;
SET autocommit = 0;



