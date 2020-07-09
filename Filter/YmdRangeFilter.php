<?php

declare(strict_types=1);

namespace EasternColor\CoreBundle\Filter;

use Sonata\DoctrineORMAdminBundle\Filter\DateTimeRangeFilter;
use Sonata\Form\Type\DateTimeRangePickerType;

class YmdRangeFilter extends DateTimeRangeFilter
{
    public function getFieldType()
    {
        return $this->getOption('field_type', DateTimeRangePickerType::class);
    }

    /**
     * {@inheritdoc}
     */
    public function getRenderSettings()
    {
        $settings = parent::getRenderSettings();
        $settings[1]['field_options']['field_options'] = ['format' => 'yyyy-MM-dd'];

        return $settings;
    }
}
