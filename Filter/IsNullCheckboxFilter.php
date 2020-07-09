<?php

declare(strict_types=1);

namespace EasternColor\CoreBundle\Filter;

use Sonata\DoctrineORMAdminBundle\Filter\CallbackFilter;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;

class IsNullCheckboxFilter extends CallbackFilter
{
    public function getDefaultOptions()
    {
        return [
            'callback' => function ($queryBuilder, $alias, $field, $value) {
                if (!$value['value']) {
                    return;
                }

                if ($this->getOption('property')) {
                    $queryBuilder->andWhere("{$alias}.{$this->getOption('property')} IS NULL");
                } else {
                    $queryBuilder->andWhere("{$alias}.{$field} IS NULL");
                }

                return true;
            },
            'field_type' => CheckboxType::class,
            'operator_type' => HiddenType::class,
            'operator_options' => [],
            'property' => null,
        ];
    }
}
