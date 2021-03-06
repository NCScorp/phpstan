<?php

namespace AppBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;
use AppBundle\Service\Web\ConfiguracoesService;
use Symfony\Component\Validator\ConstraintValidator;
use AppBundle\Service\Meurh\SolicitacoesferiasService;
use AppBundle\Validator\Constraints\PeriodoAquisitivo;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBag;

class PeriodoAquisitivoValidator extends ConstraintValidator
{
    protected $configuracoesService;
    protected $fixedAttributes;
    protected $solicitacoesferiasService;

    public function __construct(
        ConfiguracoesService $configuracoesService,
        ParameterBag $fixedAttributes,
        SolicitacoesferiasService $solicitacoesferiasService
    )
    {
        $this->configuracoesService = $configuracoesService;
        $this->fixedAttributes = $fixedAttributes;
        $this->solicitacoesferiasService = $solicitacoesferiasService;
    }

    public function validate($value, Constraint $constraint)
    {
        if (!$constraint instanceof PeriodoAquisitivo) {
            throw new UnexpectedTypeException($constraint, PeriodoAquisitivo::class);
        }

        if (empty($value)) {
            return;
        }

        $solicitacaoObj = $this->context->getRoot()->getData(); 
        $tenant = $this->fixedAttributes->get('tenant');
        $trabalhador = $solicitacaoObj->getTrabalhador();
        $periodosAquisitivosAbertos = $this->solicitacoesferiasService->listaPeriodosAquisitivosAbertos($tenant, $trabalhador);

        $datainicioperiodoAquisitivo = new \DateTimeImmutable($solicitacaoObj->getDatainicioperiodoaquisitivo());
        $dataFimPeriodoAquisitivoAtual = new \DateTimeImmutable($periodosAquisitivosAbertos['fimperiodoaquisitivoferiasatual']);

        if ($datainicioperiodoAquisitivo > $dataFimPeriodoAquisitivoAtual) {
            foreach ($periodosAquisitivosAbertos['periodosaquisitivos'] as $periodoAquisitivo) {
                $dataFimPeriodoAquisitivo = new \DateTimeImmutable($periodoAquisitivo['fimperiodoaquisitivo']);
    
                if ($dataFimPeriodoAquisitivo == $dataFimPeriodoAquisitivoAtual) {
                    if (($periodoAquisitivo['saldo'] > 0) && ($solicitacaoObj->getSituacao() == 0 || $solicitacaoObj->getSituacao() == 1)) {
                        $this->context->buildViolation('Voc?? pode criar rascunhos, mas n??o pode enviar marca????es nesse per??odo, pois voc?? possui per??odos aquisitivos anteriores com pend??ncias de envios.')->setParameter('{{ string }}', $value)->addViolation();
                    }
                }
            }
        }
    }
}