var planData = {};
$(document).ready(function(){
debugger;	
	callFaqData(); 
});



function callFaqData(){
	var fragment = '';
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
	    if (this.readyState == 4 && this.status == 200) {
	        templates = xhttp.responseText;
	        loadInitialData();
	    }
	};
	xhttp.open("GET", "public_html/fragments/faqFragment.html", true);
	xhttp.send();
}

function loadInitialData(){
	loadPlansData();
}

function loadPlansData(){
	renderPlans(myarr);
}

function renderPlans(faqData){
	$('#fragmentholder_faq').empty();
	var fragment = $(templates).filter('#faqcontent').html();
	for(var key in faqData){
    faqData[key].key = key;
		$('#fragmentholder_faq').append(Mustache.render(fragment, faqData[key]));
	}
}
var  myarr = [
    {
      "question": "What is the main teaching of Oshodhara",
      "answer": " 'Zorba the Buddha' as Osho said —‘Buddha cannot laugh QM cannot dance QM cannot sing QM cannot love. Now what kind of life will it be Hollow! Zorba can sing QM  dance QM enjoy food QM drink QM love. Think of these two becoming one. 'Zorba the Buddha' - sings QM dances…but QM with a grace QM with a beauty. Even silence will become a song for him. That is the main teaching of Oshodhara — 'Zorba the Buddha'."
    },
    {
      "question": "What are the different meditation techniques",
      "answer": "There are number of meditation techniques which one can try. Each individual is different QM but equally unique. Some are physically stronger QM some are emotionally very active and there can be varied personality people. Different meditation techniques are designed for different people. Some will involve physical workout while some will touch your emotions. E.g. – Suprabhat Dhyan QM Brahamnaad Dhyan QM Kirtan Dhyan QM Kundalini Dhyan to name a few. However QM different techniques suit different people. The technique that takes you into your deep consciousness is the most suitable technique for you. To know more contact nearest Oshodhara Dhyan center near you."
    },
    {
      "question": "What is the need to meditate in the modern era for all types of people - kids QM teenagers QM youth and elders",
      "answer": "Nowadays education and competition is growing all over the world QM consequently Ambitions & Tension take you into Frustration and Depression. Therefore QM it is the need of the hour to nurture the Mental and Emotional Health along with Physical health to live a Happy Life. The medicine for INNER WELL BEING is Meditation. Meditate to get acquainted with your inner self and live in Peace."
    },
    {
      "question": "What is Dhyan Samadhi (Oshodhara's 1st Level Program)",
      "answer": " This is the first program of Dhyan that you begin with at Oshodhara. Auspicious beginning of your spiritual journey! You get to know the Divine Sound (Onkar) QM that paves the way for you to sink into the state of Samadhi. Dhyan means Meditation QM becoming aware of one self. This is first half of the Spiritual Journey. second half of the Spiritual Journey is Samadhi- becoming aware of the WHOLE. "
    },
    {
      "question": "Does Oshodhara provides any Magazine / SMS service so we can remain in touch",
      "answer": " Yes QM A monthly Hindi journal is published regularly titled 'OSHO TODAY' to subscribe it you can contact: 9671400199 or email: galleria@oshodhara.org.in     <br /> · Astha TV Channel broadcasts OSHODHARA program daily from 6.50 to 7.10 pm.(except Sunday). · Recent 20 Astha Programs can be watched on www.totalbhakti.com     <br /> · Yearly SMS service is also available. To avail it QM Please contact - 9671400196"
    },
  {
      "question": "Which Pragya Program will be helpful to whom",
      "answer":" Sammohan Pragya teaches art of Self Hypnosis QM for generating will power in Sub Conscious mind to positively achieve your goals QM to get rid of your bad habits and many success in this life. Mahajeewan Pragya provides glimpses of past lives (PLR) QM so that we do not repeat same mistakes again QM and mould our present life in a better way. You may also realize the truth of your eternal soul QM and get rid of all kinds of fears and phobias.    Mudra Chikitsa QM Swasthya Pragya QM Homeo pragya are programs to learn different disciplines of Health Management. From time to time QM everybody falls sick and this knowledge may help to recover faster and prevent many diseases in future. These programs may prove helpful to your family and friends too. Anand Prgya teaches how to live blissfully in this world QM so that one can enjoy the work QM relations. This program is based on Eight Fold path of Lord Buddha."
    },
    {
      "question": "What is the best time of the day to meditate",
      "answer": " There is no fixed time for meditation. You can do as per your convenience. Morning time is preferred but it can be managed as desired. Once you learn the depth of meditation QM this question is not important for you QM rather you can remain meditative round the clock. Oshodhara’s one day meditation camps can be an ideal beginning for you."
    },
    {
      "question": "How long should I meditate",
      "answer": " Our various meditation techniques are designed for 45 to 60 mins. But you can do as long as you feel comfortable."
    },
    {
      "question": "Which meditation is right for me",
      "answer": "All meditation techniques are right QM some will work better than other depending on your personality and other factors. The best way to find a meditation that resonates with you QM that you feel good with QM that you enjoy is to try them and find which suits you more. You can experiment with what suits you from the various techniques available."
    },
    {
      "question": "How can I join OshodharaYou can participate in our programs like Osho Meditation Camp (1 Day) QM Dhyan Samadhi (6 Days) or other pragya program  or you can reach out to Oshodhara Dhyan Center in your city   "
    },
    {
      "question": "What are the charges for joining Oshodhara",
      "answer": "     There are no charges for joining QM but you need to pay for stay and food in ashram or other places.    "
    },
    {
      "question": "What is the duration of Oshodhara programs",
      "answer": "     We have 1 day QM 3 day & 6 day programs based on the type of selection .     "
    },
    {
      "question": "Where can I stay",
      "answer": "     All our ashrams have accommodation facilities ranging from dormitory to AC rooms. All 3 & 6 day programs are residential programs QM where you have to stay in the ashram itself.     "
    },
    {
      "question": "What about food",
      "answer": "     Nutritious & healthy food will be available in all Ashrams including breakfast\, lunch QM dinner and tea.     "
    },
    {
      "question": "Can I join Oshodhara if I have already had a Guru",
      "answer": "     Yes.        "
    },
    {
      "question": "How can I know more about Oshodhara and its programs",
      "answer": "     You can contact Oshodhara Dhyan Center in your city or contact coordinator (Get the numbers from our website). You can also subscribe to our monthly magazine Osho Today. Follow Us on social media  "
    },
    {
      "question": "Is there any program for children",
      "answer": "     Yes QM we have Bal Pragya program where children can participate.  "
    },
    {
      "question": "What does Oshodhara offer",
      "answer": "     We have various programs under the Pragya and Samadhi structure including Health\, Reiki QM Samadhi QM Hypnosis and Past life regression programs.  "
    },
    {
      "question": "How can I ask a question to Masters",
      "answer": "     You can submit your question under the comment section which will be sent to master. You can also mail your queries at <b>info@oshodhara.org.in</b> Ask genuine and relevant questions.    "
    },
    {
      "question": "Who all can participate in Pragya Programs ",
      "answer": " Everybody can participate in Pragya programs.     "
    },
    {
      "question": "Who all can participate in Samadhi Programs ",
      "answer": "     Anybody can participate in Dhyan Samadhi i.e. the first Samadhi programs.  "
    },
    {
      "question": "Is there a dress code for participating in meditation or other Oshodhara programs ",
      "answer": "    There is no specific dress code for meditation QM although casual & comfortable dress is generally preferred for meditation. For Pragya programs there is no dress code. In Samadhi Programs there is no dress code till Nirati Samadhi after that Orange robes or gown is compulsory. In addition QM it is desirable to wear a white robe or other white clothing during the evening session of meditation. White robe is must on the 5th day of the Dhyan Samadhi program also.    "
    },
    {
      "question": "Do I need any special experience to come here",
      "answer": "     No.   "
    },
    {
      "question": "Reservation Guideline",
      "answer": '      <ul class="list-group">         <li class="list-group-item">1) It is mandatory to stay in the ashram itself. Any program that might be of 3 days QM 6 days or 9 days program is residential. You are not allowed to leave the ashram during the program except for special circumstances. </li>         <li class="list-group-item">2) If you are new to Oshodhara you can begin with any Pragya program except Acharya Pragya QM Reiki Acharya and Utsav Pragya. (For these three programs you ned to do some prior programs).</li>         <li class="list-group-item">3) All Samadhi programs last for duration of 6 days each. There are 28 levels of Samadhi/sumiran programs. You can do the second level only if you have completed the first level and so on i.e. you can do a particular Samadhi group only if you have completed all the previous levels. Dhyan Samadhi is the first level.</li>         <li class="list-group-item">4) If you are interested in any program QM you can do it only if you have booked it in advance or only if you have informed us. </li>         <li class="list-group-item">5) You need to reach the ashram one day before the start of the program by 8 p.m. if not your booking will be cancelled. If there is any delay in your flight or train you can inform us in advance so we can take necessary steps on our end to prevent your booking from being cancelled. </li>         <li class="list-group-item">6) All Samadhi/sumiran groups start from early Monday morning and last till Saturday afternoon. You need to reach here on Sunday by 8pm if the program starts from Monday. </li>         <li class="list-group-item">7) Registration is done on every Sunday till 8 pm for Samadhi groups and on every Sunday and Wednesday for 3 day Pragya groups. </li>         <li class="list-group-item">8) One day meditation camp is held on every 2nd Sunday of each month at Oshodhara Nanak Dham QM Murthal QM Sonipat (Haryana) from 9 a.m. to 5 p.m. For this camp no prior booking or information is required. </li>         <li class="list-group-item">9) In the same way you can attend all the celebration programs of around 2 hours duration without any advance booking on information. </li>         <li class="list-group-item">10) For program schedule please click here (http://www.oshodhara.com/Schedule.php) </li>         <li class="list-group-item">11) Please bring a photo id and a passport size photograph with you.</li>         <li class="list-group-item">12) For any Samadhi program QM you also need a white dress kurta Pajama QM salwar suit or a white rob. </li>         <li class="list-group-item">13) There is no special dress code for Pragya programs and first three levels of Samadhi programs.</li>         <li class="list-group-item">14) All our ashrams have accommodation facilities ranging from dormitory to AC rooms ( 2 QM 3 and five bedded rooms) </li>         <li class="list-group-item">15) Purely vegetarian and nutritious food is provided including breakfast QM lunch QM dinner and tea. </li>         <li class="list-group-item">16) For detailed info call on 9671400196/93 QM 0130-2483911/12 from 10 am to 6 pm or write to us at booking@oshodhara.org.in</li>     </ul> '
    }
  ]

