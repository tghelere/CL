<?php

use Faker\Generator as Faker;
use App\Models\Post;
use Illuminate\Support\Str;

$factory->define(Post::class, function (Faker $faker) {

    $title = $faker->sentence;
    $slug = Str::slug($title);

    $body = "<h3>Paulum, cum regem Persem captum adduceret, eodem flumine invectio?</h3> <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Non enim, si omnia non sequebatur, idcirco non erat ortus illinc. Addo etiam illud, multa iam mihi dare signa puerum et pudoris et ingenii, sed aetatem vides. Duo Reges: constructio interrete. <b>Prave, nequiter, turpiter cenabat;</b> Est autem a te semper dictum nec gaudere quemquam nisi propter corpus nec dolere. <a href=\"http://loripsum.net/\" target=\"_blank\">Hoc tu nunc in illo probas.</a> Consequens enim est et post oritur, ut dixi. Beatus autem esse in maximarum rerum timore nemo potest. </p><dl> <dt><dfn>Erat enim Polemonis.</dfn></dt> <dd>Neque enim disputari sine reprehensione nec cum iracundia aut pertinacia recte disputari potest.</dd> <dt><dfn>Sint ista Graecorum;</dfn></dt> <dd>Illa argumenta propria videamus, cur omnia sint paria peccata.</dd> <dt><dfn>Audeo dicere, inquit.</dfn></dt> <dd>Quod autem principium officii quaerunt, melius quam Pyrrho;</dd> <dt><dfn>Peccata paria.</dfn></dt> <dd>Quid turpius quam sapientis vitam ex insipientium sermone pendere?</dd> </dl> <ol> <li>Quis enim potest ea, quae probabilia videantur ei, non probare?</li><li>Conferam tecum, quam cuique verso rem subicias;</li></ol> <img class=\"img-fluid rounded mx-auto d-block\" src=\"https://placeimg.com/640/480/any/{$faker->randomDigit}\"> <ul> <li>Portenta haec esse dicit, neque ea ratione ullo modo posse vivi;</li><li>Ita enim se Athenis collocavit, ut sit paene unus ex Atticis, ut id etiam cognomen videatur habiturus.</li><li>Qui non moveatur et offensione turpitudinis et comprobatione honestatis?</li></ul> <blockquote cite=\"http://loripsum.net\"> Aliam vero vim voluptatis esse, aliam nihil dolendi, nisi valde pertinax fueris, concedas necesse est. </blockquote> <p>Sed residamus, inquit, si placet. Ut optime, secundum naturam affectum esse possit. Si alia sentit, inquam, alia loquitur, numquam intellegam quid sentiat; Me igitur ipsum ames oportet, non mea, si veri amici futuri sumus. Quod quidem nobis non saepe contingit. Vide, quantum, inquam, fallare, Torquate. Hoc est vim afferre, Torquate, sensibus, extorquere ex animis cognitiones verborum, quibus inbuti sumus. Ita redarguitur ipse a sese, convincunturque scripta eius probitate ipsius ac moribus. Esse enim quam vellet iniquus iustus poterat inpune. </p><p><i>Tum mihi Piso: Quid ergo?</i> Quare conare, quaeso. Rhetorice igitur, inquam, nos mavis quam dialectice disputare? <mark>Esse enim quam vellet iniquus iustus poterat inpune.</mark> Sic, et quidem diligentius saepiusque ista loquemur inter nos agemusque communiter. Ita ne hoc quidem modo paria peccata sunt. <b>Quippe: habes enim a rhetoribus;</b> </p>";

    return [
        'title' => $title,
        'description' => $faker->text($maxNbChars = 150),
        'body' => $body,
        // 'image' => '/img/blog/posts/' . $faker->numberBetween($min = 1, $max = 6) . '.jpg',
        'image' => 'https://placeimg.com/400/300/people/' . $faker->numberBetween($min = 1, $max = 100),
        'slug' => $slug,
    ];

});
