<?php

declare(strict_types=1);

namespace Potter\Event;

use Potter\Event\Dispatcher\{DispatcherInterface, Dispatcher};

trait EmitterTrait
{
    private DispatcherInterface $dispatcher;
    
    final public function getDispatcher(): DispatcherInterface
    {
        return $this->dispatcher ?? $this->setDispatcher();
    }
    
    final protected function setDispatcher(?DispatcherInterface $dispatcher = null): DispatcherInterface
    {
        return $this->dispatcher = ($dispatcher ?? new Dispatcher);
    }
    
    final public function withDispatcher(?DispatcherInterface $dispatcher = null): static
    {
        $clone = $this->getClone();
        $clone->setDispatcher($dispatcher);
        return $clone;
    }
    
    abstract public function getClone(): static;
}
