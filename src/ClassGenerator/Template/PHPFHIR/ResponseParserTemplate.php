<?php namespace DCarbone\PHPFHIR\ClassGenerator\Template\PHPFHIR;

/*
 * Copyright 2016-2018 Daniel Carbone (daniel.p.carbone@gmail.com)
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

use DCarbone\PHPFHIR\ClassGenerator\Config;
use DCarbone\PHPFHIR\ClassGenerator\Utilities\CopyrightUtils;

/**
 * Class ResponseParserTemplate
 * @package DCarbone\PHPFHIR\ClassGenerator\Template\PHPFHIR
 */
class ResponseParserTemplate extends AbstractPHPFHIRClassTemplate
{
    /**
     * ResponseParserTemplate constructor.
     * @param \DCarbone\PHPFHIR\ClassGenerator\Config $config
     */
    public function __construct(Config $config)
    {
        parent::__construct($config, 'PHPFHIRResponseParser');
    }

    /**
     * @return string
     */
    public function compileTemplate()
    {
        return sprintf(
            include PHPFHIR_TEMPLATE_DIR . '/response_parser_template.php',
            $this->outputNamespace,
            CopyrightUtils::getBasePHPFHIRCopyrightComment()
        );
    }
}