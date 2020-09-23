<?php

declare(strict_types=1);

namespace HoPeter1018\SonataAdminHelperBundle\Filter;

use HoPeter1018\SonataAdminHelperBundle\Form\Type\NumberRangeType;
use Sonata\AdminBundle\Datagrid\ProxyQueryInterface;
use Sonata\AdminBundle\Form\Type\Filter\DefaultType;
use Sonata\AdminBundle\Form\Type\Operator\NumberOperatorType;
use Sonata\DoctrineORMAdminBundle\Filter\Filter;

class NumberRangeFilter extends Filter
{
    protected $range = true;

    /**
     * {@inheritdoc}
     */
    public function filter(ProxyQueryInterface $queryBuilder, $alias, $field, $data)
    {
        // check data sanity
        if (!$data or !is_array($data) or !array_key_exists('value', $data)) {
            return;
        }

        if ($this->range) {
            // additional data check for ranged items
            if (!array_key_exists('from', $data['value']) and !array_key_exists('to', $data['value'])) {
                return;
            }

            if (!$data['value']['from'] and !$data['value']['to']) {
                return;
            }

            if ($data['value']['from']) {
                $fromQuantity = $this->getNewParameterName($queryBuilder);
                $this->applyWhere($queryBuilder, sprintf('%s %s :%s', static::getField($alias, $field), '>=', $fromQuantity));
                $queryBuilder->setParameter($fromQuantity, $data['value']['from']);
            }

            if ($data['value']['to']) {
                $toQuantity = $this->getNewParameterName($queryBuilder);
                $this->applyWhere($queryBuilder, sprintf('%s %s :%s', static::getField($alias, $field), '<=', $toQuantity));
                $queryBuilder->setParameter($toQuantity, $data['value']['to']);
            }
        }
    }

    public static function getField($alias, $field)
    {
        return sprintf('%s.%s', $alias, $field);
    }

    /**
     * {@inheritdoc}
     */
    public function getDefaultOptions()
    {
        return [];
    }

    /**
     * {@inheritdoc}
     */
    public function getRenderSettings()
    {
        // dump($this, $this->getFieldOptions());

        return[
          DefaultType::class,
          [
              'field_type' => NumberRangeType::class,
              'field_options' => $this->getFieldOptions(),
              // 'operator_type' => null,
              // 'operator_type' => NumberOperatorType::class,
              // 'operator_options' => [],
              'label' => $this->getLabel(),
          ],
        ];
    }
}
