<h1 align = "center">
<strong>module-hreflang</strong>
</h1>

<p align="center">
   <a href="https://www.linkedin.com/in/danilo-alexandrino-4aaa1518b/">
      <img alt="Danilo Alexandrino" src="https://img.shields.io/badge/-Danilo%20Alexandrino-ff8c00?style=flat&logo=Linkedin&logoColor=white" />
   </a>
  <a href="https://github.com/daniloaldm/module-hreflang/commits/master">
    <img alt="GitHub last commit" src="https://img.shields.io/github/last-commit/daniloaldm/module-hreflang?color=ff8c00">
  </a> 
  <a href="https://github.com/daniloaldm/module-hreflang/blob/master/LICENSE"><img alt="License" src="https://img.shields.io/badge/license-MIT-ff8c00">
  </a>
  <a href="https://github.com/daniloaldm/module-hreflang/stargazers"><img alt="Stargazers" src="https://img.shields.io/github/stars/daniloaldm/module-hreflang?color=ff8c00&logo=github">
  </a>
</p>

##  📌 Tecnologias utilizadas para desenvolver o módulo
🍂 [Magento 2 - Magento Community v2.3](https://devdocs.magento.com/guides/v2.3/install-gde/composer.html)<br>
🐳 [Docker - Criação de ambientes isolados via container](https://github.com/daniloaldm/Magento2) <br>

## 🛠️ Ferramentas Utilizadas
- [Phpstorm](https://www.jetbrains.com/pt-br/phpstorm/)

## 📕 Informações

Tarefa #1 - Apenas backend

O cliente tem uma configuração multi-site com algumas páginas CMS que são compartilhadas
entre diferentes sites. O problema que eles estão tendo é que isso está causando problemas de
conteúdo duplicado e afetando seus rankings de SEO. Para resolver isso, criaremos um novo
módulo que fará o seguinte:

1. Adicione um bloco à head;
2. O bloco deve ser capaz de identificar o id da página CMS e verificar se a página é usada em
múltiplos views/stores loja;
3. Nesse caso, deve adicionar uma meta tag hreflang ao cabeçalho;
4. Se a metatag for exibida - ela deve exibir o idioma da loja, como “en-gb”, “en-us”,
etc. As metatag devem ter valores específicos para cada país;
5. Apoie o fato de que cada loja deve ter um par de idiomas diferente.

## 🚀 Instalação

Execute o seguinte comando na pasta raiz do Magento 2:

### Via composer
```
composer require daniloaldm/module-hreflang:dev-master
php bin/magento setup:upgrade
php bin/magento setup:static-content:deploy -f
```

### Manual

Caso a instalação via composer não funcione, na raiz do Magento 2 execute: 

```
mkdir app/code/Daniloaldm
cd app/code/Daniloaldm
git clone https://github.com/daniloaldm/module-hreflang.git HrefLang
php bin/magento setup:upgrade
php bin/magento setup:static-content:deploy -f
```

## 👨‍💻 [](<[https://github.com/daniloaldm/module-hreflang](https://github.com/daniloaldm/module-hreflang)#autor>)Autor

Criado por [**Danilo Alexandrino** ](https://github.com/daniloaldm), <br>esse projeto está sobre [MIT license](./LICENSE) 📃.

Coloque uma ⭐️ caso esse projeto tenha lhe ajudado :heart:
