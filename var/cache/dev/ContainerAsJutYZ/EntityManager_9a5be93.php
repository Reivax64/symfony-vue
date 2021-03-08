<?php

namespace ContainerAsJutYZ;
include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'doctrine'.\DIRECTORY_SEPARATOR.'persistence'.\DIRECTORY_SEPARATOR.'lib'.\DIRECTORY_SEPARATOR.'Doctrine'.\DIRECTORY_SEPARATOR.'Persistence'.\DIRECTORY_SEPARATOR.'ObjectManager.php';
include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'doctrine'.\DIRECTORY_SEPARATOR.'orm'.\DIRECTORY_SEPARATOR.'lib'.\DIRECTORY_SEPARATOR.'Doctrine'.\DIRECTORY_SEPARATOR.'ORM'.\DIRECTORY_SEPARATOR.'EntityManagerInterface.php';
include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'doctrine'.\DIRECTORY_SEPARATOR.'orm'.\DIRECTORY_SEPARATOR.'lib'.\DIRECTORY_SEPARATOR.'Doctrine'.\DIRECTORY_SEPARATOR.'ORM'.\DIRECTORY_SEPARATOR.'EntityManager.php';

class EntityManager_9a5be93 extends \Doctrine\ORM\EntityManager implements \ProxyManager\Proxy\VirtualProxyInterface
{

    /**
     * @var \Doctrine\ORM\EntityManager|null wrapped object, if the proxy is initialized
     */
    private $valueHolder8cedc = null;

    /**
     * @var \Closure|null initializer responsible for generating the wrapped object
     */
    private $initializer3c695 = null;

    /**
     * @var bool[] map of public properties of the parent class
     */
    private static $publicProperties30ad3 = [
        
    ];

    public function getConnection()
    {
        $this->initializer3c695 && ($this->initializer3c695->__invoke($valueHolder8cedc, $this, 'getConnection', array(), $this->initializer3c695) || 1) && $this->valueHolder8cedc = $valueHolder8cedc;

        return $this->valueHolder8cedc->getConnection();
    }

    public function getMetadataFactory()
    {
        $this->initializer3c695 && ($this->initializer3c695->__invoke($valueHolder8cedc, $this, 'getMetadataFactory', array(), $this->initializer3c695) || 1) && $this->valueHolder8cedc = $valueHolder8cedc;

        return $this->valueHolder8cedc->getMetadataFactory();
    }

    public function getExpressionBuilder()
    {
        $this->initializer3c695 && ($this->initializer3c695->__invoke($valueHolder8cedc, $this, 'getExpressionBuilder', array(), $this->initializer3c695) || 1) && $this->valueHolder8cedc = $valueHolder8cedc;

        return $this->valueHolder8cedc->getExpressionBuilder();
    }

    public function beginTransaction()
    {
        $this->initializer3c695 && ($this->initializer3c695->__invoke($valueHolder8cedc, $this, 'beginTransaction', array(), $this->initializer3c695) || 1) && $this->valueHolder8cedc = $valueHolder8cedc;

        return $this->valueHolder8cedc->beginTransaction();
    }

    public function getCache()
    {
        $this->initializer3c695 && ($this->initializer3c695->__invoke($valueHolder8cedc, $this, 'getCache', array(), $this->initializer3c695) || 1) && $this->valueHolder8cedc = $valueHolder8cedc;

        return $this->valueHolder8cedc->getCache();
    }

    public function transactional($func)
    {
        $this->initializer3c695 && ($this->initializer3c695->__invoke($valueHolder8cedc, $this, 'transactional', array('func' => $func), $this->initializer3c695) || 1) && $this->valueHolder8cedc = $valueHolder8cedc;

        return $this->valueHolder8cedc->transactional($func);
    }

    public function commit()
    {
        $this->initializer3c695 && ($this->initializer3c695->__invoke($valueHolder8cedc, $this, 'commit', array(), $this->initializer3c695) || 1) && $this->valueHolder8cedc = $valueHolder8cedc;

        return $this->valueHolder8cedc->commit();
    }

    public function rollback()
    {
        $this->initializer3c695 && ($this->initializer3c695->__invoke($valueHolder8cedc, $this, 'rollback', array(), $this->initializer3c695) || 1) && $this->valueHolder8cedc = $valueHolder8cedc;

        return $this->valueHolder8cedc->rollback();
    }

    public function getClassMetadata($className)
    {
        $this->initializer3c695 && ($this->initializer3c695->__invoke($valueHolder8cedc, $this, 'getClassMetadata', array('className' => $className), $this->initializer3c695) || 1) && $this->valueHolder8cedc = $valueHolder8cedc;

        return $this->valueHolder8cedc->getClassMetadata($className);
    }

    public function createQuery($dql = '')
    {
        $this->initializer3c695 && ($this->initializer3c695->__invoke($valueHolder8cedc, $this, 'createQuery', array('dql' => $dql), $this->initializer3c695) || 1) && $this->valueHolder8cedc = $valueHolder8cedc;

        return $this->valueHolder8cedc->createQuery($dql);
    }

    public function createNamedQuery($name)
    {
        $this->initializer3c695 && ($this->initializer3c695->__invoke($valueHolder8cedc, $this, 'createNamedQuery', array('name' => $name), $this->initializer3c695) || 1) && $this->valueHolder8cedc = $valueHolder8cedc;

        return $this->valueHolder8cedc->createNamedQuery($name);
    }

    public function createNativeQuery($sql, \Doctrine\ORM\Query\ResultSetMapping $rsm)
    {
        $this->initializer3c695 && ($this->initializer3c695->__invoke($valueHolder8cedc, $this, 'createNativeQuery', array('sql' => $sql, 'rsm' => $rsm), $this->initializer3c695) || 1) && $this->valueHolder8cedc = $valueHolder8cedc;

        return $this->valueHolder8cedc->createNativeQuery($sql, $rsm);
    }

    public function createNamedNativeQuery($name)
    {
        $this->initializer3c695 && ($this->initializer3c695->__invoke($valueHolder8cedc, $this, 'createNamedNativeQuery', array('name' => $name), $this->initializer3c695) || 1) && $this->valueHolder8cedc = $valueHolder8cedc;

        return $this->valueHolder8cedc->createNamedNativeQuery($name);
    }

    public function createQueryBuilder()
    {
        $this->initializer3c695 && ($this->initializer3c695->__invoke($valueHolder8cedc, $this, 'createQueryBuilder', array(), $this->initializer3c695) || 1) && $this->valueHolder8cedc = $valueHolder8cedc;

        return $this->valueHolder8cedc->createQueryBuilder();
    }

    public function flush($entity = null)
    {
        $this->initializer3c695 && ($this->initializer3c695->__invoke($valueHolder8cedc, $this, 'flush', array('entity' => $entity), $this->initializer3c695) || 1) && $this->valueHolder8cedc = $valueHolder8cedc;

        return $this->valueHolder8cedc->flush($entity);
    }

    public function find($className, $id, $lockMode = null, $lockVersion = null)
    {
        $this->initializer3c695 && ($this->initializer3c695->__invoke($valueHolder8cedc, $this, 'find', array('className' => $className, 'id' => $id, 'lockMode' => $lockMode, 'lockVersion' => $lockVersion), $this->initializer3c695) || 1) && $this->valueHolder8cedc = $valueHolder8cedc;

        return $this->valueHolder8cedc->find($className, $id, $lockMode, $lockVersion);
    }

    public function getReference($entityName, $id)
    {
        $this->initializer3c695 && ($this->initializer3c695->__invoke($valueHolder8cedc, $this, 'getReference', array('entityName' => $entityName, 'id' => $id), $this->initializer3c695) || 1) && $this->valueHolder8cedc = $valueHolder8cedc;

        return $this->valueHolder8cedc->getReference($entityName, $id);
    }

    public function getPartialReference($entityName, $identifier)
    {
        $this->initializer3c695 && ($this->initializer3c695->__invoke($valueHolder8cedc, $this, 'getPartialReference', array('entityName' => $entityName, 'identifier' => $identifier), $this->initializer3c695) || 1) && $this->valueHolder8cedc = $valueHolder8cedc;

        return $this->valueHolder8cedc->getPartialReference($entityName, $identifier);
    }

    public function clear($entityName = null)
    {
        $this->initializer3c695 && ($this->initializer3c695->__invoke($valueHolder8cedc, $this, 'clear', array('entityName' => $entityName), $this->initializer3c695) || 1) && $this->valueHolder8cedc = $valueHolder8cedc;

        return $this->valueHolder8cedc->clear($entityName);
    }

    public function close()
    {
        $this->initializer3c695 && ($this->initializer3c695->__invoke($valueHolder8cedc, $this, 'close', array(), $this->initializer3c695) || 1) && $this->valueHolder8cedc = $valueHolder8cedc;

        return $this->valueHolder8cedc->close();
    }

    public function persist($entity)
    {
        $this->initializer3c695 && ($this->initializer3c695->__invoke($valueHolder8cedc, $this, 'persist', array('entity' => $entity), $this->initializer3c695) || 1) && $this->valueHolder8cedc = $valueHolder8cedc;

        return $this->valueHolder8cedc->persist($entity);
    }

    public function remove($entity)
    {
        $this->initializer3c695 && ($this->initializer3c695->__invoke($valueHolder8cedc, $this, 'remove', array('entity' => $entity), $this->initializer3c695) || 1) && $this->valueHolder8cedc = $valueHolder8cedc;

        return $this->valueHolder8cedc->remove($entity);
    }

    public function refresh($entity)
    {
        $this->initializer3c695 && ($this->initializer3c695->__invoke($valueHolder8cedc, $this, 'refresh', array('entity' => $entity), $this->initializer3c695) || 1) && $this->valueHolder8cedc = $valueHolder8cedc;

        return $this->valueHolder8cedc->refresh($entity);
    }

    public function detach($entity)
    {
        $this->initializer3c695 && ($this->initializer3c695->__invoke($valueHolder8cedc, $this, 'detach', array('entity' => $entity), $this->initializer3c695) || 1) && $this->valueHolder8cedc = $valueHolder8cedc;

        return $this->valueHolder8cedc->detach($entity);
    }

    public function merge($entity)
    {
        $this->initializer3c695 && ($this->initializer3c695->__invoke($valueHolder8cedc, $this, 'merge', array('entity' => $entity), $this->initializer3c695) || 1) && $this->valueHolder8cedc = $valueHolder8cedc;

        return $this->valueHolder8cedc->merge($entity);
    }

    public function copy($entity, $deep = false)
    {
        $this->initializer3c695 && ($this->initializer3c695->__invoke($valueHolder8cedc, $this, 'copy', array('entity' => $entity, 'deep' => $deep), $this->initializer3c695) || 1) && $this->valueHolder8cedc = $valueHolder8cedc;

        return $this->valueHolder8cedc->copy($entity, $deep);
    }

    public function lock($entity, $lockMode, $lockVersion = null)
    {
        $this->initializer3c695 && ($this->initializer3c695->__invoke($valueHolder8cedc, $this, 'lock', array('entity' => $entity, 'lockMode' => $lockMode, 'lockVersion' => $lockVersion), $this->initializer3c695) || 1) && $this->valueHolder8cedc = $valueHolder8cedc;

        return $this->valueHolder8cedc->lock($entity, $lockMode, $lockVersion);
    }

    public function getRepository($entityName)
    {
        $this->initializer3c695 && ($this->initializer3c695->__invoke($valueHolder8cedc, $this, 'getRepository', array('entityName' => $entityName), $this->initializer3c695) || 1) && $this->valueHolder8cedc = $valueHolder8cedc;

        return $this->valueHolder8cedc->getRepository($entityName);
    }

    public function contains($entity)
    {
        $this->initializer3c695 && ($this->initializer3c695->__invoke($valueHolder8cedc, $this, 'contains', array('entity' => $entity), $this->initializer3c695) || 1) && $this->valueHolder8cedc = $valueHolder8cedc;

        return $this->valueHolder8cedc->contains($entity);
    }

    public function getEventManager()
    {
        $this->initializer3c695 && ($this->initializer3c695->__invoke($valueHolder8cedc, $this, 'getEventManager', array(), $this->initializer3c695) || 1) && $this->valueHolder8cedc = $valueHolder8cedc;

        return $this->valueHolder8cedc->getEventManager();
    }

    public function getConfiguration()
    {
        $this->initializer3c695 && ($this->initializer3c695->__invoke($valueHolder8cedc, $this, 'getConfiguration', array(), $this->initializer3c695) || 1) && $this->valueHolder8cedc = $valueHolder8cedc;

        return $this->valueHolder8cedc->getConfiguration();
    }

    public function isOpen()
    {
        $this->initializer3c695 && ($this->initializer3c695->__invoke($valueHolder8cedc, $this, 'isOpen', array(), $this->initializer3c695) || 1) && $this->valueHolder8cedc = $valueHolder8cedc;

        return $this->valueHolder8cedc->isOpen();
    }

    public function getUnitOfWork()
    {
        $this->initializer3c695 && ($this->initializer3c695->__invoke($valueHolder8cedc, $this, 'getUnitOfWork', array(), $this->initializer3c695) || 1) && $this->valueHolder8cedc = $valueHolder8cedc;

        return $this->valueHolder8cedc->getUnitOfWork();
    }

    public function getHydrator($hydrationMode)
    {
        $this->initializer3c695 && ($this->initializer3c695->__invoke($valueHolder8cedc, $this, 'getHydrator', array('hydrationMode' => $hydrationMode), $this->initializer3c695) || 1) && $this->valueHolder8cedc = $valueHolder8cedc;

        return $this->valueHolder8cedc->getHydrator($hydrationMode);
    }

    public function newHydrator($hydrationMode)
    {
        $this->initializer3c695 && ($this->initializer3c695->__invoke($valueHolder8cedc, $this, 'newHydrator', array('hydrationMode' => $hydrationMode), $this->initializer3c695) || 1) && $this->valueHolder8cedc = $valueHolder8cedc;

        return $this->valueHolder8cedc->newHydrator($hydrationMode);
    }

    public function getProxyFactory()
    {
        $this->initializer3c695 && ($this->initializer3c695->__invoke($valueHolder8cedc, $this, 'getProxyFactory', array(), $this->initializer3c695) || 1) && $this->valueHolder8cedc = $valueHolder8cedc;

        return $this->valueHolder8cedc->getProxyFactory();
    }

    public function initializeObject($obj)
    {
        $this->initializer3c695 && ($this->initializer3c695->__invoke($valueHolder8cedc, $this, 'initializeObject', array('obj' => $obj), $this->initializer3c695) || 1) && $this->valueHolder8cedc = $valueHolder8cedc;

        return $this->valueHolder8cedc->initializeObject($obj);
    }

    public function getFilters()
    {
        $this->initializer3c695 && ($this->initializer3c695->__invoke($valueHolder8cedc, $this, 'getFilters', array(), $this->initializer3c695) || 1) && $this->valueHolder8cedc = $valueHolder8cedc;

        return $this->valueHolder8cedc->getFilters();
    }

    public function isFiltersStateClean()
    {
        $this->initializer3c695 && ($this->initializer3c695->__invoke($valueHolder8cedc, $this, 'isFiltersStateClean', array(), $this->initializer3c695) || 1) && $this->valueHolder8cedc = $valueHolder8cedc;

        return $this->valueHolder8cedc->isFiltersStateClean();
    }

    public function hasFilters()
    {
        $this->initializer3c695 && ($this->initializer3c695->__invoke($valueHolder8cedc, $this, 'hasFilters', array(), $this->initializer3c695) || 1) && $this->valueHolder8cedc = $valueHolder8cedc;

        return $this->valueHolder8cedc->hasFilters();
    }

    /**
     * Constructor for lazy initialization
     *
     * @param \Closure|null $initializer
     */
    public static function staticProxyConstructor($initializer)
    {
        static $reflection;

        $reflection = $reflection ?? new \ReflectionClass(__CLASS__);
        $instance   = $reflection->newInstanceWithoutConstructor();

        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $instance, 'Doctrine\\ORM\\EntityManager')->__invoke($instance);

        $instance->initializer3c695 = $initializer;

        return $instance;
    }

    protected function __construct(\Doctrine\DBAL\Connection $conn, \Doctrine\ORM\Configuration $config, \Doctrine\Common\EventManager $eventManager)
    {
        static $reflection;

        if (! $this->valueHolder8cedc) {
            $reflection = $reflection ?? new \ReflectionClass('Doctrine\\ORM\\EntityManager');
            $this->valueHolder8cedc = $reflection->newInstanceWithoutConstructor();
        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $this, 'Doctrine\\ORM\\EntityManager')->__invoke($this);

        }

        $this->valueHolder8cedc->__construct($conn, $config, $eventManager);
    }

    public function & __get($name)
    {
        $this->initializer3c695 && ($this->initializer3c695->__invoke($valueHolder8cedc, $this, '__get', ['name' => $name], $this->initializer3c695) || 1) && $this->valueHolder8cedc = $valueHolder8cedc;

        if (isset(self::$publicProperties30ad3[$name])) {
            return $this->valueHolder8cedc->$name;
        }

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder8cedc;

            $backtrace = debug_backtrace(false, 1);
            trigger_error(
                sprintf(
                    'Undefined property: %s::$%s in %s on line %s',
                    $realInstanceReflection->getName(),
                    $name,
                    $backtrace[0]['file'],
                    $backtrace[0]['line']
                ),
                \E_USER_NOTICE
            );
            return $targetObject->$name;
        }

        $targetObject = $this->valueHolder8cedc;
        $accessor = function & () use ($targetObject, $name) {
            return $targetObject->$name;
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = & $accessor();

        return $returnValue;
    }

    public function __set($name, $value)
    {
        $this->initializer3c695 && ($this->initializer3c695->__invoke($valueHolder8cedc, $this, '__set', array('name' => $name, 'value' => $value), $this->initializer3c695) || 1) && $this->valueHolder8cedc = $valueHolder8cedc;

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder8cedc;

            $targetObject->$name = $value;

            return $targetObject->$name;
        }

        $targetObject = $this->valueHolder8cedc;
        $accessor = function & () use ($targetObject, $name, $value) {
            $targetObject->$name = $value;

            return $targetObject->$name;
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = & $accessor();

        return $returnValue;
    }

    public function __isset($name)
    {
        $this->initializer3c695 && ($this->initializer3c695->__invoke($valueHolder8cedc, $this, '__isset', array('name' => $name), $this->initializer3c695) || 1) && $this->valueHolder8cedc = $valueHolder8cedc;

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder8cedc;

            return isset($targetObject->$name);
        }

        $targetObject = $this->valueHolder8cedc;
        $accessor = function () use ($targetObject, $name) {
            return isset($targetObject->$name);
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = $accessor();

        return $returnValue;
    }

    public function __unset($name)
    {
        $this->initializer3c695 && ($this->initializer3c695->__invoke($valueHolder8cedc, $this, '__unset', array('name' => $name), $this->initializer3c695) || 1) && $this->valueHolder8cedc = $valueHolder8cedc;

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder8cedc;

            unset($targetObject->$name);

            return;
        }

        $targetObject = $this->valueHolder8cedc;
        $accessor = function () use ($targetObject, $name) {
            unset($targetObject->$name);

            return;
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $accessor();
    }

    public function __clone()
    {
        $this->initializer3c695 && ($this->initializer3c695->__invoke($valueHolder8cedc, $this, '__clone', array(), $this->initializer3c695) || 1) && $this->valueHolder8cedc = $valueHolder8cedc;

        $this->valueHolder8cedc = clone $this->valueHolder8cedc;
    }

    public function __sleep()
    {
        $this->initializer3c695 && ($this->initializer3c695->__invoke($valueHolder8cedc, $this, '__sleep', array(), $this->initializer3c695) || 1) && $this->valueHolder8cedc = $valueHolder8cedc;

        return array('valueHolder8cedc');
    }

    public function __wakeup()
    {
        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $this, 'Doctrine\\ORM\\EntityManager')->__invoke($this);
    }

    public function setProxyInitializer(\Closure $initializer = null) : void
    {
        $this->initializer3c695 = $initializer;
    }

    public function getProxyInitializer() : ?\Closure
    {
        return $this->initializer3c695;
    }

    public function initializeProxy() : bool
    {
        return $this->initializer3c695 && ($this->initializer3c695->__invoke($valueHolder8cedc, $this, 'initializeProxy', array(), $this->initializer3c695) || 1) && $this->valueHolder8cedc = $valueHolder8cedc;
    }

    public function isProxyInitialized() : bool
    {
        return null !== $this->valueHolder8cedc;
    }

    public function getWrappedValueHolderValue()
    {
        return $this->valueHolder8cedc;
    }


}

if (!\class_exists('EntityManager_9a5be93', false)) {
    \class_alias(__NAMESPACE__.'\\EntityManager_9a5be93', 'EntityManager_9a5be93', false);
}
