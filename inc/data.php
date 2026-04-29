<?php
/**
 * All site content, mirrored from the original data.jsx.
 * Swap this file for WP_Query + CPTs whenever you're ready to make the
 * content editable through the admin — every template reads from
 * luminary_data(), so you only have to change one function.
 */

if ( ! defined( 'ABSPATH' ) ) exit;

function luminary_data() {
    static $data = null;
    if ( $data !== null ) return $data;

    $data = [
        'nav' => [
            [ 'id' => 'home',       'label' => 'Home',       'url' => home_url( '/' ) ],
            [ 'id' => 'programs',   'label' => 'Programs',   'url' => home_url( '/programs/' ) ],
            [ 'id' => 'summits',    'label' => 'Summits',    'url' => home_url( '/summits/' ) ],
            [ 'id' => 'members',    'label' => 'Members',    'url' => home_url( '/members/' ) ],
            [ 'id' => 'stories',    'label' => 'Stories',    'url' => home_url( '/stories/' ) ],
            [ 'id' => 'membership', 'label' => 'Membership', 'url' => home_url( '/membership/' ) ],
        ],
        'testimonials' => [
            [
                'quote'   => "Luminary is the only room where I could name what I actually wanted — and be taken seriously within the hour.",
                'name'    => 'Amara Okonkwo',
                'role'    => 'Founder & CEO, Meridian Biotech',
                'initial' => 'A',
                'plate'   => 'v-coral',
                'img'     => 'testimonial-video-thumb',
            ],
            [
                'quote'   => "I joined for the network and stayed for the mirror. These women see me before I see myself.",
                'name'    => 'Sana Reyes',
                'role'    => 'Partner, Hearth Capital',
                'initial' => 'S',
                'plate'   => 'v-blush',
                'img'     => 'member-portrait-02',
            ],
            [
                'quote'   => "An hour at a Luminary retreat changed the next five years of my career. No hyperbole.",
                'name'    => 'Joon Park',
                'role'    => 'Chief Product Officer, Aster Health',
                'initial' => 'J',
                'plate'   => 'v-honey',
                'img'     => 'member-portrait-03',
            ],
        ],
        'programs' => [
            [
                'id'          => 'mastermind',
                'name'        => 'The Mastermind',
                'kicker'      => 'Peer cohort',
                'description' => "Twelve-month intimate cohort of twelve operators meeting monthly. A confidential room for the decisions that don't fit anywhere else.",
                'duration'    => '12 months',
                'cohort'      => '12 members',
                'investment'  => '$18,000',
                'cadence'     => 'Monthly, in-person + virtual',
                'plate'       => 'v-blush',
                'next'        => 'Cohort begins May 2026',
                'img'         => 'program-mastermind',
            ],
            [
                'id'          => 'mentorship',
                'name'        => '1:1 Mentorship',
                'kicker'      => 'Private pairing',
                'description' => 'A six-month private pairing with a hand-matched senior leader. Structured sessions, a written arc, and the quiet momentum of being known.',
                'duration'    => '6 months',
                'cohort'      => 'Private pairing',
                'investment'  => '$9,500',
                'cadence'     => 'Bi-weekly, 90 minutes',
                'plate'       => 'v-coral',
                'next'        => 'Rolling enrollment',
                'img'         => 'program-mentorship',
            ],
            [
                'id'          => 'executive',
                'name'        => 'Executive Circle',
                'kicker'      => 'C-suite & founders',
                'description' => 'For women running $25M+ businesses. A three-times-yearly gathering in London, New York, and Lisbon. Chatham House rules, always.',
                'duration'    => 'Ongoing',
                'cohort'      => '24 members',
                'investment'  => '$36,000 / year',
                'cadence'     => 'Three retreats + standing calls',
                'plate'       => 'v-honey',
                'next'        => 'By nomination',
                'img'         => 'program-executive',
            ],
            [
                'id'          => 'founders',
                'name'        => 'Founders Lab',
                'kicker'      => 'Early-stage builders',
                'description' => "A ninety-day sprint for women raising their first or second round. Weekly working sessions, investor warm intros, and an ending we actually celebrate.",
                'duration'    => '90 days',
                'cohort'      => '8 founders',
                'investment'  => '$6,500',
                'cadence'     => 'Weekly sprints',
                'plate'       => 'v-green',
                'next'        => 'Cohort begins June 2026',
                'img'         => 'program-founders',
            ],
        ],
        'summits' => [
            [
                'id' => 'lumi-lisbon', 'status' => 'upcoming',
                'title' => 'Summit Lisbon', 'subtitle' => 'The Atlantic Edition',
                'date' => 'June 12–15, 2026', 'city' => 'Lisbon, Portugal',
                'venue' => 'Quinta da Aurora',
                'speakers' => [ 'Dr. Zahra Aziz', 'Min-Jung Chen', 'Polina Ivanova', 'Celine Boulanger', 'Rhea Vaidya' ],
                'plate' => 'v-honey', 'spots' => '42 of 60 claimed',
                'img' => 'summit-01-stage',
            ],
            [
                'id' => 'lumi-nyc', 'status' => 'upcoming',
                'title' => 'Fall Salon', 'subtitle' => 'New York Edition',
                'date' => 'October 3, 2026', 'city' => 'New York, NY',
                'venue' => 'The Orangery, Brooklyn Navy Yard',
                'speakers' => [ 'Ines Okafor', 'Valeria Campos', 'Dr. Nalini Rao' ],
                'plate' => 'v-coral', 'spots' => 'Waitlist open',
                'img' => 'summit-03-cocktail',
            ],
            [
                'id' => 'lumi-aspen', 'status' => 'upcoming',
                'title' => 'Winter Retreat', 'subtitle' => 'Aspen Edition',
                'date' => 'January 9–12, 2027', 'city' => 'Aspen, CO',
                'venue' => 'Hotel Solaria',
                'speakers' => [ 'Farah Abboud', 'Jin Suh', 'Ella Montano' ],
                'plate' => 'v-aqua', 'spots' => 'Invitation only',
                'img' => 'summit-04-yoga',
            ],
            [
                'id' => 'lumi-past-london', 'status' => 'past',
                'title' => 'Summit London', 'subtitle' => '2025',
                'date' => 'November 2025', 'city' => 'London, UK',
                'venue' => 'The Conservatory, Marylebone',
                'speakers' => [ '72 members gathered' ],
                'plate' => 'v-blush',
                'img' => 'summit-05-fireside',
            ],
            [
                'id' => 'lumi-past-kyoto', 'status' => 'past',
                'title' => 'Spring Circle', 'subtitle' => '2025',
                'date' => 'March 2025', 'city' => 'Kyoto, Japan',
                'venue' => 'Hanazono House',
                'speakers' => [ '48 members gathered' ],
                'plate' => 'v-ivory',
                'img' => 'summit-02-mastermind-table',
            ],
            [
                'id' => 'lumi-past-marfa', 'status' => 'past',
                'title' => 'Desert Sessions', 'subtitle' => '2024',
                'date' => 'October 2024', 'city' => 'Marfa, TX',
                'venue' => 'La Casona',
                'speakers' => [ '36 members gathered' ],
                'plate' => 'v-honey',
                'img' => 'summit-06-book',
            ],
        ],
        'members' => [
            [ 'id' => 1, 'name' => 'Amara Okonkwo', 'role' => 'Founder & CEO', 'company' => 'Meridian Biotech', 'industry' => 'Healthcare', 'region' => 'North America', 'program' => 'Executive Circle', 'quote' => 'Building a company is a long, slow act of self-authorship.', 'initial' => 'A', 'plate' => 'v-coral', 'img' => 'member-portrait-01' ],
            [ 'id' => 2, 'name' => 'Sana Reyes', 'role' => 'Partner', 'company' => 'Hearth Capital', 'industry' => 'Finance', 'region' => 'North America', 'program' => 'Executive Circle', 'quote' => 'My rate of learning is my only real moat.', 'initial' => 'S', 'plate' => 'v-blush', 'img' => 'member-portrait-02' ],
            [ 'id' => 3, 'name' => 'Min-Jung Chen', 'role' => 'Chief Product Officer', 'company' => 'Aster Health', 'industry' => 'Healthcare', 'region' => 'Asia Pacific', 'program' => 'Mentorship', 'quote' => 'Clarity is a kindness. I practice it daily.', 'initial' => 'M', 'plate' => 'v-honey', 'img' => 'member-portrait-03' ],
            [ 'id' => 4, 'name' => 'Polina Ivanova', 'role' => 'Founder', 'company' => 'Kalos Studio', 'industry' => 'Creative', 'region' => 'Europe', 'program' => 'Founders Lab', 'quote' => 'Taste is the work of paying attention for decades.', 'initial' => 'P', 'plate' => 'v-ivory', 'img' => 'member-portrait-04' ],
            [ 'id' => 5, 'name' => 'Celine Boulanger', 'role' => 'Creative Director', 'company' => 'Maison Aurora', 'industry' => 'Creative', 'region' => 'Europe', 'program' => 'Mastermind', 'quote' => 'I stopped asking for permission in my thirties.', 'initial' => 'C', 'plate' => 'v-green', 'img' => 'member-portrait-05' ],
            [ 'id' => 6, 'name' => 'Rhea Vaidya', 'role' => 'General Counsel', 'company' => 'Helios AI', 'industry' => 'Technology', 'region' => 'North America', 'program' => 'Mentorship', 'quote' => 'Good judgment is an aesthetic. Train it like one.', 'initial' => 'R', 'plate' => 'v-aqua', 'img' => 'member-portrait-06' ],
            [ 'id' => 7, 'name' => 'Ines Okafor', 'role' => 'Managing Director', 'company' => 'Northstar Advisory', 'industry' => 'Finance', 'region' => 'Europe', 'program' => 'Executive Circle', 'quote' => 'The room is only as generous as its most senior person.', 'initial' => 'I', 'plate' => 'v-coral', 'img' => 'member-portrait-07' ],
            [ 'id' => 8, 'name' => 'Valeria Campos', 'role' => 'Founder', 'company' => 'Buenos Reads', 'industry' => 'Media', 'region' => 'Latin America', 'program' => 'Founders Lab', 'quote' => 'I built the thing I needed at 22.', 'initial' => 'V', 'plate' => 'v-honey', 'img' => 'member-portrait-08' ],
            [ 'id' => 9, 'name' => 'Dr. Nalini Rao', 'role' => 'Professor & Author', 'company' => 'Stanford GSB', 'industry' => 'Education', 'region' => 'North America', 'program' => 'Mentorship', 'quote' => "Research taught me to follow what I can't stop thinking about.", 'initial' => 'N', 'plate' => 'v-blush', 'img' => 'member-portrait-09' ],
            [ 'id' => 10, 'name' => 'Farah Abboud', 'role' => 'VP Engineering', 'company' => 'Solstice Labs', 'industry' => 'Technology', 'region' => 'Middle East', 'program' => 'Mastermind', 'quote' => 'I write code and careers the same way: in drafts.', 'initial' => 'F', 'plate' => 'v-green', 'img' => 'member-portrait-10' ],
            [ 'id' => 11, 'name' => 'Jin Suh', 'role' => 'CEO', 'company' => 'Vellum Publishing', 'industry' => 'Media', 'region' => 'Asia Pacific', 'program' => 'Executive Circle', 'quote' => "Stories shape markets. I've stopped being shy about it.", 'initial' => 'J', 'plate' => 'v-aqua', 'img' => 'member-portrait-11' ],
            [ 'id' => 12, 'name' => 'Ella Montano', 'role' => 'Founder & COO', 'company' => 'Campo Grocer', 'industry' => 'Retail', 'region' => 'Latin America', 'program' => 'Mastermind', 'quote' => 'Operational beauty is an underrated form of love.', 'initial' => 'E', 'plate' => 'v-ivory', 'img' => 'member-portrait-12' ],
        ],
        'stories' => [
            [ 'id' => 1, 'kicker' => 'Essay', 'title' => 'The case for quiet ambition', 'author' => 'Amara Okonkwo', 'readTime' => '9 min', 'date' => 'April 2026', 'plate' => 'v-blush', 'size' => 'tall', 'excerpt' => 'On the steady, almost unglamorous practice of building a company you can still stand inside of in ten years.', 'img' => 'story-cover-01-journaling' ],
            [ 'id' => 2, 'kicker' => 'Interview', 'title' => 'Min-Jung Chen on clarity as a management practice', 'author' => 'Editorial', 'readTime' => '14 min', 'date' => 'April 2026', 'plate' => 'v-coral', 'size' => 'wide', 'excerpt' => 'The Aster Health CPO on the memos she rewrites, the calls she shortens, and why taste is a team skill.', 'img' => 'story-cover-02-keynote' ],
            [ 'id' => 3, 'kicker' => 'Framework', 'title' => 'The Three Questions framework', 'author' => 'Sana Reyes', 'readTime' => '6 min', 'date' => 'March 2026', 'plate' => 'v-honey', 'size' => 'square', 'excerpt' => "A quarterly check-in for operators who don't want to be ambushed by their own lives.", 'img' => 'story-cover-03-dinner' ],
            [ 'id' => 4, 'kicker' => 'Essay', 'title' => 'On being the only woman in the room, and then not', 'author' => 'Farah Abboud', 'readTime' => '11 min', 'date' => 'March 2026', 'plate' => 'v-green', 'size' => 'tall', 'excerpt' => 'The arc from representation to redesign — and what it cost to stop being grateful.', 'img' => 'story-cover-04-rooftop' ],
            [ 'id' => 5, 'kicker' => 'Interview', 'title' => 'Valeria Campos is building media for the other half of Latin America', 'author' => 'Editorial', 'readTime' => '10 min', 'date' => 'February 2026', 'plate' => 'v-ivory', 'size' => 'wide', 'excerpt' => 'From Buenos Aires to São Paulo, a new literary press for readers the market forgot.', 'img' => 'story-cover-05-bookshelf' ],
            [ 'id' => 6, 'kicker' => 'Essay', 'title' => 'A short theology of rest', 'author' => 'Dr. Nalini Rao', 'readTime' => '7 min', 'date' => 'February 2026', 'plate' => 'v-aqua', 'size' => 'square', 'excerpt' => "Sabbath for founders who don't know they needed one.", 'img' => 'story-cover-06-street' ],
            [ 'id' => 7, 'kicker' => 'Framework', 'title' => 'Reference checks, reimagined', 'author' => 'Ines Okafor', 'readTime' => '5 min', 'date' => 'January 2026', 'plate' => 'v-blush', 'size' => 'square', 'excerpt' => 'The four questions that reliably surface what nobody will say on the call.', 'img' => 'story-cover-07-workshop' ],
            [ 'id' => 8, 'kicker' => 'Essay', 'title' => 'Money is a language. Learn it early.', 'author' => 'Rhea Vaidya', 'readTime' => '12 min', 'date' => 'January 2026', 'plate' => 'v-honey', 'size' => 'tall', 'excerpt' => "A general counsel's field guide to the conversations your twenties skipped.", 'img' => 'story-cover-08-coffee' ],
        ],
        'tiers' => [
            [
                'id' => 'circle', 'name' => 'Circle',
                'price' => '$2,400', 'cadence' => 'per year',
                'summary' => 'A thoughtful start. Monthly salons, the member directory, and the Stories archive.',
                'features' => [
                    [ 'label' => 'Monthly virtual salons', 'included' => true ],
                    [ 'label' => 'Member directory access', 'included' => true ],
                    [ 'label' => 'Stories archive & frameworks', 'included' => true ],
                    [ 'label' => 'Two guest passes per year', 'included' => true ],
                    [ 'label' => 'Regional chapter meetups', 'included' => true ],
                    [ 'label' => '1:1 mentor pairing', 'included' => false ],
                    [ 'label' => 'Summit priority access', 'included' => false ],
                    [ 'label' => 'Executive Circle retreats', 'included' => false ],
                ],
                'plate' => 'v-blush', 'img' => 'tier-circle', 'featured' => false,
            ],
            [
                'id' => 'collective', 'name' => 'Collective',
                'price' => '$7,800', 'cadence' => 'per year',
                'summary' => 'The working heart. Cohort membership, two summits a year, and a matched mentor.',
                'featured' => true,
                'features' => [
                    [ 'label' => 'Everything in Circle', 'included' => true ],
                    [ 'label' => 'Annual Mastermind cohort seat', 'included' => true ],
                    [ 'label' => '1:1 matched mentor pairing', 'included' => true ],
                    [ 'label' => 'Priority summit access (two per year)', 'included' => true ],
                    [ 'label' => 'Quarterly small-group dinners', 'included' => true ],
                    [ 'label' => 'Warm intros desk', 'included' => true ],
                    [ 'label' => 'Executive Circle retreats', 'included' => false ],
                    [ 'label' => 'Invitation-only board roles', 'included' => false ],
                ],
                'plate' => 'v-coral', 'img' => 'tier-collective',
            ],
            [
                'id' => 'inner', 'name' => 'Inner Circle',
                'price' => '$24,000', 'cadence' => 'per year',
                'summary' => 'By nomination. For women at the helm — retreats, board pairings, a concierge.',
                'features' => [
                    [ 'label' => 'Everything in Collective', 'included' => true ],
                    [ 'label' => 'Executive Circle retreats (three per year)', 'included' => true ],
                    [ 'label' => 'Personal concierge & chief of staff access', 'included' => true ],
                    [ 'label' => 'Invitation-only board role program', 'included' => true ],
                    [ 'label' => 'Press & speaking desk', 'included' => true ],
                    [ 'label' => 'Family & partner invitations', 'included' => true ],
                    [ 'label' => 'Private residence access', 'included' => true ],
                    [ 'label' => 'Co-investment opportunities', 'included' => true ],
                ],
                'plate' => 'v-honey', 'img' => 'tier-inner', 'featured' => false,
            ],
        ],
        'faqs' => [
            [ 'q' => 'Is Luminary only for women?', 'a' => 'Yes. Our programs, membership, and rooms are for women and nonbinary people who move through the world as women. Our summits welcome guests across the gender spectrum.' ],
            [ 'q' => 'How selective is the application?', 'a' => 'Circle accepts roughly 40% of applicants. Collective, 18%. Inner Circle is nomination-only and caps at 150 women globally.' ],
            [ 'q' => 'What does a typical member look like?', 'a' => 'The median member is 38, runs a team of 20, and is three to five years into a decision that will define her decade. We index for interior, not resume.' ],
            [ 'q' => 'Can my company pay?', 'a' => 'Most do. We provide a sponsorship memo you can hand to your CFO. Roughly 70% of members are sponsored.' ],
            [ 'q' => "What if I can't afford it?", 'a' => 'Ten percent of every cohort is on full or partial fellowship. Apply on the same form and note it in the review step.' ],
            [ 'q' => 'How long between applying and hearing back?', 'a' => 'Two weeks for Circle and Collective, three for Inner Circle. Every applicant receives a written reply, always.' ],
        ],
        'press' => [ 'Vanity Fair', 'Vogue Business', 'Monocle', 'The Atlantic', 'Financial Times', 'Kinfolk' ],
    ];

    return $data;
}

function luminary( $key ) {
    $d = luminary_data();
    return $d[ $key ] ?? null;
}
