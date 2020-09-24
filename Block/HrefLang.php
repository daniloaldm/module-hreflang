<?php
namespace Daniloaldm\HrefLang\Block;

use Magento\Framework\App\Request\Http;
use Magento\Framework\View\Element\Template\Context;
use Magento\Framework\View\Element\Template;
use Magento\Cms\Api\PageRepositoryInterface;
use Magento\Cms\Model\ResourceModel\Page;
use Magento\CmsUrlRewrite\Model\CmsPageUrlPathGenerator;

class HrefLang extends Template
{
    /**
     * @var CmsPageUrlPathGenerator
     */
    private $cmsPageUrlPathGenerator;

    /**
     * @var PageRepositoryInterface
     */
    private $pageRepository;

    /**
     * @var PageResource
     */
    private $pageResource;

    /**
     * @var Http
     */
    private $request;

    /**
     * HrefLang constructor.
     * @param Template\Context $context
     * @param CmsPageUrlPathGenerator $cmsPageUrlPathGenerator
     * @param Page $pageResource
     * @param array $data
     */
    public function __construct(
        Context $context,
        Http $request,
        CmsPageUrlPathGenerator $cmsPageUrlPathGenerator,
        PageRepositoryInterface $pageRepository,
        Page $pageResource,
        array $data = []
    )
    {
        parent::__construct($context, $data);
        $this->cmsPageUrlPathGenerator = $cmsPageUrlPathGenerator;
        $this->pageRepository = $pageRepository;
        $this->pageResource = $pageResource;
        $this->request = $request;
    }

    /**
     * @return array|null
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getAlternate()
    {
        $alternate = [];
        foreach ($this->_storeManager->getStores() as $store) {
            $url = $this->getCmsPageUrl($this->request->getParam('page_id'), $store);
            if ($url) {
                $alternate[$this->getLocaleCode($store)] = $url;
            }
        }
        return (count($alternate) > 1) ? $alternate : null;
    }

    /**
     * @param $id
     * @param $store
     * @return string
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    private function getCmsPageUrl($id, $store)
    {
        $page = $this->pageRepository->getById($id);
        $pageId = $this->pageResource->checkIdentifier($page->getIdentifier(), $store->getId());
        if ($pageId) {
            $storePage = $this->pageRepository->getById($pageId);
            $path = $this->cmsPageUrlPathGenerator->getUrlPath($storePage);
            return $store->getBaseUrl() . $path;
        }
    }

    /**
     * @param $store
     * @return mixed
     */
    private function getLocaleCode($store)
    {
        $localeCode = $this->_scopeConfig->getValue('general/locale/code', 'stores', $store->getId());
        return str_replace('_', '-', strtolower($localeCode));
    }
}