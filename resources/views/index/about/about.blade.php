@extends('layout.front.app')

@section('og')
    <meta property="og:type" content="home"/>
    <meta property="og:title" content="{{ config('app.name') }}"/>
    <meta property="og:description" content="{{ config('app.name') }}"/>
@endsection

@section('content')
<div class="container">
    <div class="box">
        STEAM代表科学（Science），技术（Technology），工程（Engineering），艺术（Arts），数学（Mathematics）。STEAM教育就是集科学，技术，工程，艺术，数学多领域融合的综合教育。
        STEAM是一种教育理念，有别于传统的单学科、重书本知识的教育方式。STEAM是一种重实践的超学科教育概念。任何事情的成功都不仅仅依靠某一种能力的实现，而是需要介于多种能力之间，比如高科技电子产品的建造过程中，不但需要科学技术，运用高科技手段创新产品功能，还需要好看的外观，也就是艺术等方面的综合才能，所以单一技能的运用已经无法支撑未来人才的发展，未来，我们需要的是多方面的综合型人才。 从而探索出STEAM教育理念。 [2] 
STEAM教育理念最早是美国政府提出的教育倡议，为加强美国K12关于科学、技术、工程、艺术以及数学的教育。STEAM的原身是STEM理念，即科学（Science）、技术（Technology）、工程（Engineering）、数学（Mathematics）的首字母。鼓励孩子在科学、技术、工程和数学领域的发展和提高，培养孩子的综合素养，从而提升其全球竞争力。近期加入了Arts，也就是艺术，变得更加全面。 [2] 
STEAM教育在美国的重要性不亚于中国的素质教育，在美国大部分中小学都设有STEAM教育的经费开支，而STEAM也被老师、校长、教育家们时时挂在嘴边。在STEAM教育的号召下，机器人、3D打印机进入了学校；奥巴马也加入了全民学编程的队伍，写下了自己的第一条代码；帮助孩子们学习数学、科学的教育科技产品层出不穷；而且这五个学科，技术和工程结合，艺术和数学结合，打破常规了学科界限。 [2]  
    </div>
</div>
@endsection