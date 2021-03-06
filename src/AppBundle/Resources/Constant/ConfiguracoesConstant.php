<?php

namespace AppBundle\Resources\Constant;

abstract class ConfiguracoesConstant {
    const CONFIGURACOES = [
        "TITULO_DASHBOARD",
        "MENSAGEM_DASHBOARD",
        "DATA_LIBERACAO_CONTRACHEQUE",
        "ATRASO_ADMISSAO",
        "ATRASO_RESCISAO",
        "AVISO_IMINENCIA_VENCIMENTO_FERIAS",
        "PRAZO_AVISO_IMINENCIA_VENCIMENTO_FERIAS",
        "AVISO_VENCIMENTO_FERIAS",
        "AVISO_IMINENCIA_DOBRA_FERIAS",
        "PRAZO_AVISO_IMINENCIA_DOBRA_FERIAS",
        "AVISO_FERIAS_DOBRADAS",
        "AVISO_FIM_PERIODO_EXPERIENCIA",
        "PRAZO_AVISO_FIM_PERIODO_EXPERIENCIA",
        "AVISO_APONTAMENTO",
        "PRAZO_AVISO_APONTAMENTO",
        "AVISO_DOCUMENTOS_ADICIONADOS",
        "PRAZO_AVISO_DOCUMENTOS_ADICIONADOS",
        "AVISO_FUNCIONARIO_CONTRATADO",
        "PRAZO_AVISO_FUNCIONARIO_CONTRATADO",
        "AVISO_FUNCIONARIO_DEMITIDO",
        "PRAZO_AVISO_FUNCIONARIO_DEMITIDO",
        "AVISO_AVISO_FERIAS",
        "PRAZO_AVISO_AVISO_FERIAS",
        "AVISO_VT_ADICIONAL_APROVADO",
        "PRAZO_AVISO_ADICIONAL_APROVADO",
        "AVISO_VT_ADICIONAL_REJEITADO",
        "PRAZO_AVISO_VT_ADICIONAL_REJEITADO",
        "AVISO_ALTERACAOVT_APROVADA",
        "PRAZO_AVISO_ALTERACAOVT_APROVADA",
        "AVISO_ALTERACAOVT_REJEITADA",
        "PRAZO_AVISO_ALTERACAOVT_REJEITADA",
        "AVISO_ADIANTAMENTO_AVULSO_APROVADO",
        "PRAZO_AVISO_ADIANTAMENTO_AVULSO_APROVADO",
        "AVISO_ADIANTAMENTO_AVULSO_REJEITADO",
        "PRAZO_AVISO_ADIANTAMENTO_AVULSO_REJEITADO",
        "COMUNICADO_DASHBOARD",
        "PERMITIR_RASCUNHO_APONTAMENTO",
        "FECHAMENTO_APONTAMENTO",
        "TIMEZONE",
        "MENSAGEM_APONTAMENTO",
        "PERSONALIZACAO",
        'ADIANTAMENTO_13_FERIAS',
        'MARCAR_FERIAS_ANTES_PERIODO',
        'APENAS_ADMIN_CRIA_APONTAMENTO',
        'SOLICITACAO_FERIAS_VENDER_DIAS',
        'SOLICITACAO_FERIAS_ADT_13',
        'NOTIFICACAO_GESTORES_TODOS_NIVEIS',
        'NOT_MEUTRABALHO_CANCELAR_ALTERACAO_ENDERECO',
        'NOT_MEUTRABALHO_CANCELAR_ALTERACAO_VT',
        'NOT_MEUTRABALHO_CANCELAR_FALTA',
        'NOT_MEUTRABALHO_CANCELAR_FERIAS',
        'TEM_MEUTRABALHO_CANCELAR_ALTERACAO_ENDERECO',
        'TEM_MEUTRABALHO_CANCELAR_ALTERACAO_VT',
        'TEM_MEUTRABALHO_CANCELAR_FALTA',
        'TEM_MEUTRABALHO_CANCELAR_FERIAS'
    ];

    const AVISOS_DASHBOARD = [
        "AVISO_IMINENCIA_VENCIMENTO_FERIAS",
        "AVISO_VENCIMENTO_FERIAS",
        "AVISO_IMINENCIA_DOBRA_FERIAS",
        "AVISO_FERIAS_DOBRADAS",
        "AVISO_FIM_PERIODO_EXPERIENCIA",
        "AVISO_APONTAMENTO",
        "AVISO_DOCUMENTOS_ADICIONADOS",
        "AVISO_FUNCIONARIO_CONTRATADO",
        "AVISO_FUNCIONARIO_DEMITIDO",
        "AVISO_AVISO_FERIAS",
        "AVISO_VT_ADICIONAL_APROVADO",
        "AVISO_VT_ADICIONAL_REJEITADO",
        "AVISO_ALTERACAOVT_APROVADA",
        "AVISO_ALTERACAOVT_REJEITADA",
        "AVISO_ADIANTAMENTO_AVULSO_APROVADO",
        "AVISO_ADIANTAMENTO_AVULSO_REJEITADO",];

    const PRAZOS_AVISOS_DASHBOARD = [
        "PRAZO_AVISO_IMINENCIA_VENCIMENTO_FERIAS",
        "PRAZO_AVISO_IMINENCIA_DOBRA_FERIAS",
        "PRAZO_AVISO_FIM_PERIODO_EXPERIENCIA",
        "PRAZO_AVISO_APONTAMENTO",
        "PRAZO_AVISO_DOCUMENTOS_ADICIONADOS",
        "PRAZO_AVISO_FUNCIONARIO_CONTRATADO",
        "PRAZO_AVISO_FUNCIONARIO_DEMITIDO",
        "PRAZO_AVISO_AVISO_FERIAS",
        "PRAZO_AVISO_VT_ADICIONAL_APROVADO",
        "PRAZO_AVISO_VT_ADICIONAL_REJEITADO",
        "PRAZO_AVISO_ALTERACAOVT_APROVADA",
        "PRAZO_AVISO_ALTERACAOVT_REJEITADA",
        "PRAZO_AVISO_ADIANTAMENTO_AVULSO_APROVADO",
        "PRAZO_AVISO_ADIANTAMENTO_AVULSO_REJEITADO",];

    const CONFIGURACOES_BOOLEANAS = [
        "AVISO_IMINENCIA_VENCIMENTO_FERIAS",
        "AVISO_VENCIMENTO_FERIAS",
        "AVISO_IMINENCIA_DOBRA_FERIAS",
        "AVISO_FERIAS_DOBRADAS",
        "AVISO_FIM_PERIODO_EXPERIENCIA",
        "AVISO_APONTAMENTO",
        "AVISO_DOCUMENTOS_ADICIONADOS",
        "AVISO_FUNCIONARIO_CONTRATADO",
        "AVISO_FUNCIONARIO_DEMITIDO",
        "AVISO_AVISO_FERIAS",
        "AVISO_VT_ADICIONAL_APROVADO",
        "AVISO_VT_ADICIONAL_REJEITADO",
        "AVISO_ALTERACAOVT_APROVADA",
        "AVISO_ALTERACAOVT_REJEITADA",
        "AVISO_ADIANTAMENTO_AVULSO_APROVADO",
        "AVISO_ADIANTAMENTO_AVULSO_REJEITADO",
        'PERMITIR_RASCUNHO_APONTAMENTO',
        'ADIANTAMENTO_13_FERIAS',
        'MARCAR_FERIAS_ANTES_PERIODO',
        'APENAS_ADMIN_CRIA_APONTAMENTO',
        'SOLICITACAO_FERIAS_VENDER_DIAS',
        'SOLICITACAO_FERIAS_ADT_13',
        'NOTIFICACAO_GESTORES_TODOS_NIVEIS',
        'NOT_MEUTRABALHO_CANCELAR_ALTERACAO_ENDERECO',
        'NOT_MEUTRABALHO_CANCELAR_ALTERACAO_VT',
        'NOT_MEUTRABALHO_CANCELAR_FALTA',
        'NOT_MEUTRABALHO_CANCELAR_FERIAS'
    ];
}