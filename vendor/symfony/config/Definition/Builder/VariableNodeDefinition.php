<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace RectorPrefix20220601\Symfony\Component\Config\Definition\Builder;

use RectorPrefix20220601\Symfony\Component\Config\Definition\NodeInterface;
use RectorPrefix20220601\Symfony\Component\Config\Definition\VariableNode;
/**
 * This class provides a fluent interface for defining a node.
 *
 * @author Johannes M. Schmitt <schmittjoh@gmail.com>
 */
class VariableNodeDefinition extends \RectorPrefix20220601\Symfony\Component\Config\Definition\Builder\NodeDefinition
{
    /**
     * Instantiate a Node.
     */
    protected function instantiateNode() : \RectorPrefix20220601\Symfony\Component\Config\Definition\VariableNode
    {
        return new \RectorPrefix20220601\Symfony\Component\Config\Definition\VariableNode($this->name, $this->parent, $this->pathSeparator);
    }
    /**
     * {@inheritdoc}
     */
    protected function createNode() : \RectorPrefix20220601\Symfony\Component\Config\Definition\NodeInterface
    {
        $node = $this->instantiateNode();
        if (null !== $this->normalization) {
            $node->setNormalizationClosures($this->normalization->before);
        }
        if (null !== $this->merge) {
            $node->setAllowOverwrite($this->merge->allowOverwrite);
        }
        if (\true === $this->default) {
            $node->setDefaultValue($this->defaultValue);
        }
        $node->setAllowEmptyValue($this->allowEmptyValue);
        $node->addEquivalentValue(null, $this->nullEquivalent);
        $node->addEquivalentValue(\true, $this->trueEquivalent);
        $node->addEquivalentValue(\false, $this->falseEquivalent);
        $node->setRequired($this->required);
        if ($this->deprecation) {
            $node->setDeprecated($this->deprecation['package'], $this->deprecation['version'], $this->deprecation['message']);
        }
        if (null !== $this->validation) {
            $node->setFinalValidationClosures($this->validation->rules);
        }
        return $node;
    }
}
