<template><div><h1 id="v2-版本开发目标" tabindex="-1"><a class="header-anchor" href="#v2-版本开发目标" aria-hidden="true">#</a> V2 版本开发目标</h1>
<p>核心系统重大升级,解锁许多新奇能力。
MiraiTravel 将会容纳更多的平台。
不同机器人对象可以相互调用。
拥有好用的插件,组件下载器。
控制台能力升级,赋予控制台模式更多的能力。
拥有更加方便易读的文档与教程,可以让小白快速上手开发。
使得依赖管理更加规整。
静态文件流管理,保护静态文件的安全。</p>
<h1 id="v2-版本开发任务" tabindex="-1"><a class="header-anchor" href="#v2-版本开发任务" aria-hidden="true">#</a> V2 版本开发任务</h1>
<p>开发 Outlook 适配器。
兼容OneBot协议。
将会出台新的 Software : <code v-pre>ComponentsManager</code> 与 <code v-pre>PluginsManager</code> 。
开发文件流管理器,只有设置为可读取的静态文件,才可以被外部读取,所有位于框架内的静态文件均会被代理。</p>
<h1 id="公告" tabindex="-1"><a class="header-anchor" href="#公告" aria-hidden="true">#</a> 公告</h1>
<p>由于会有多处升级。
对于日常开发者需要注意以下几点：</p>
<h2 id="命名空间的变化" tabindex="-1"><a class="header-anchor" href="#命名空间的变化" aria-hidden="true">#</a> 命名空间的变化</h2>
<p>由于此次更新变动较大,有许多命名空间也会被改变.
以下是几个举子 :</p>
<p><code v-pre>MiraiTravel\MiraiApi</code> 将会被移到 ： <code v-pre>MiraiTravel\Components\Mirai\Api</code></p>
<p><code v-pre>MiraiTravel\QQObj</code> 将会被移到 ：<code v-pre>MiraiTravel\Components\Mirai\QQObj</code></p>
<p><code v-pre>MiraiTravel\QQObj\Script</code> 将会被移到 ： <code v-pre>MiraiTravel\QQObj\Script\2771717841</code></p>
<h2 id="依赖管理" tabindex="-1"><a class="header-anchor" href="#依赖管理" aria-hidden="true">#</a> 依赖管理</h2>
<p>对于插件的依赖,需要放置在插件安装目录的子目录下。
对于脚本的依赖,需要放在脚本同名文件夹下。</p>
<h2 id="控制台能力" tabindex="-1"><a class="header-anchor" href="#控制台能力" aria-hidden="true">#</a> 控制台能力</h2>
<p>控制台会被赋予大部分能力,理论控制台可以拥有的能力是最多的。</p>
<h2 id="管理系统" tabindex="-1"><a class="header-anchor" href="#管理系统" aria-hidden="true">#</a> 管理系统</h2>
<p>管理系统重大升级,引入核心脚本类型 <code v-pre>President</code> , <code v-pre>Administrator</code> 。
支持错误与服务器核心多重管理。</p>
<h1 id="声明" tabindex="-1"><a class="header-anchor" href="#声明" aria-hidden="true">#</a> 声明</h1>
<p>由于是预公告所以实际情况可能会有出入</p>
</div></template>


