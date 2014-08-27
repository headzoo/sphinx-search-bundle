<?php
namespace Headzoo\SphinxSearchBundle\DependencyInjection;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;
use Symfony\Component\Config\Definition\Processor;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

class SphinxSearchExtension extends Extension
{
	public function load(array $configs, ContainerBuilder $container)
	{
		$processor = new Processor();
		$configuration = new Configuration();

		$config = $processor->processConfiguration($configuration, $configs);

		$loader = new XmlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));

		$loader->load('sphinx_search.xml');

		/**
		 * Indexer.
		 */
		if( isset($config['indexer']) ) {
			$container->setParameter('search.sphinx_search.indexer.bin', $config['indexer']['bin']);
		}

		/**
		 * Indexes.
		 */
		$container->setParameter('search.sphinx_search.indexes', $config['indexes']);

		/**
		 * Searchd.
		 */
		if( isset($config['searchd']) ) {
			$container->setParameter('search.sphinx_search.searchd.host', $config['searchd']['host']);
			$container->setParameter('search.sphinx_search.searchd.port', $config['searchd']['port']);
			$container->setParameter('search.sphinx_search.searchd.socket', $config['searchd']['socket']);
		}
	}

	public function getAlias()
	{
		return 'sphinx_search';
	}
}
