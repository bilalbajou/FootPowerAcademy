import { createI18n } from 'vue-i18n';

const messages = {
  en: {
    nav: {
      home: 'Home',
      about: 'About',
      programs: 'Programs',
      coaches: 'Our Coaches',
      findUs: 'Find Us',
      contact: 'Contact',
      login: 'Login',
      register: 'Register',
    },
    hero: {
      title: 'FootPower Academy',
      subtitle: 'Train. Grow. Succeed. Empowering the next generation of soccer stars.',
      contact: 'Contact Us',
    },
    about: {
      title: 'About FootPower Academy',
      desc: 'At FootPower Academy, we nurture young talent and build character through the beautiful game of soccer. Our mission is to develop skills, teamwork, and confidence in every athlete—preparing them for success both on and off the field.',
      features: {
        coaching: {
          title: 'Expert Coaching Staff',
          desc: 'Certified professionals with years of experience in youth development and competitive soccer.'
        },
        facilities: {
          title: 'Modern Training Facilities',
          desc: 'State-of-the-art fields, equipment, and training facilities designed for optimal player development.'
        },
        development: {
          title: 'Personalized Development',
          desc: 'Individual attention and customized training plans to help each player reach their full potential.'
        },
        community: {
          title: 'Teamwork & Community',
          desc: 'Building strong relationships, sportsmanship, and a supportive community atmosphere.'
        }
      }
    },
    // ... Add more sections as needed
  },
  fr: {
    nav: {
      home: 'Accueil',
      about: 'À propos',
      programs: 'Programmes',
      coaches: 'Nos entraîneurs',
      findUs: 'Nous trouver',
      contact: 'Contact',
      login: 'Connexion',
      register: 'Inscription',
    },
    hero: {
      title: 'FootPower Academy',
      subtitle: 'Entraînez-vous. Grandissez. Réussissez. Donner du pouvoir à la prochaine génération de stars du football.',
      contact: 'Contactez-nous',
    },
    about: {
      title: 'À propos de FootPower Academy',
      desc: "À FootPower Academy, nous cultivons les jeunes talents et construisons le caractère à travers le beau jeu du football. Notre mission est de développer les compétences, l'esprit d'équipe et la confiance de chaque athlète—les préparant à réussir sur et en dehors du terrain.",
      features: {
        coaching: {
          title: 'Entraîneurs experts',
          desc: "Professionnels certifiés avec des années d'expérience dans le développement des jeunes et le football de compétition."
        },
        facilities: {
          title: 'Installations modernes',
          desc: "Terrains, équipements et installations de pointe conçus pour un développement optimal des joueurs."
        },
        development: {
          title: 'Développement personnalisé',
          desc: 'Attention individuelle et plans de formation personnalisés pour aider chaque joueur à atteindre son plein potentiel.'
        },
        community: {
          title: 'Esprit d’équipe & Communauté',
          desc: 'Créer des relations solides, le fair-play et une atmosphère communautaire de soutien.'
        }
      }
    },
    // ... Add more sections as needed
  },
  ar: {
    nav: {
      home: 'الرئيسية',
      about: 'من نحن',
      programs: 'البرامج',
      coaches: 'مدربونا',
      findUs: 'موقعنا',
      contact: 'اتصل بنا',
      login: 'تسجيل الدخول',
      register: 'إنشاء حساب',
    },
    hero: {
      title: 'FootPower Academy',
      subtitle: 'تدرب. نمُ. انجز. تمكين الجيل القادم من نجوم كرة القدم.',
      contact: 'اتصل بنا',
    },
    about: {
      title: 'عن FootPower Academy',
      desc: 'في FootPower Academy، نرعى المواهب الشابة ونبني الشخصية من خلال لعبة كرة القدم الجميلة. مهمتنا هي تطوير المهارات والعمل الجماعي والثقة بالنفس لكل لاعب—لإعداده للنجاح داخل وخارج الملعب.',
      features: {
        coaching: {
          title: 'طاقم تدريب خبير',
          desc: 'محترفون معتمدون لديهم سنوات من الخبرة في تطوير الشباب وكرة القدم التنافسية.'
        },
        facilities: {
          title: 'مرافق تدريب حديثة',
          desc: 'ملاعب ومعدات ومرافق متطورة مصممة لتطوير اللاعبين بشكل مثالي.'
        },
        development: {
          title: 'تطوير شخصي',
          desc: 'اهتمام فردي وخطط تدريب مخصصة لمساعدة كل لاعب على تحقيق إمكاناته الكاملة.'
        },
        community: {
          title: 'العمل الجماعي والمجتمع',
          desc: 'بناء علاقات قوية وروح رياضية وأجواء مجتمعية داعمة.'
        }
      }
    },
    // ... Add more sections as needed
  }
};

const i18n = createI18n({
  legacy: false,
  locale: localStorage.getItem('locale') || 'en',
  fallbackLocale: 'en',
  messages,
});

export default i18n;

