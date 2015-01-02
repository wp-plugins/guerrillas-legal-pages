<?php
/*
Plugin Name: Guerrilla's Legal Pages
Plugin URI: http://madebyguerrilla.com
Description: This is a plugin that adds legal pages to your website.
Version: 1.0.0
Author: Mike Smith
Author URI: http://www.madebyguerrilla.com
*/

/*  Copyright 2014  Mike Smith (email : hi@madebyguerrilla.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

/* Runs when plugin is activated */
register_activation_hook(__FILE__,'guerrilla_legal_pages_install'); 
/* Runs on plugin deactivation*/
register_deactivation_hook( __FILE__, 'guerrilla_legal_pages_remove' );

function guerrilla_legal_pages_install() {

    global $wpdb;

    $the_page_title = 'Privacy Policy';
    $the_page_name = 'privacy-policy';
	$sitename = get_bloginfo( 'name' );

    // the menu entry...
    delete_option("guerrilla_legal_pages_page_title");
    add_option("guerrilla_legal_pages_page_title", $the_page_title, '', 'yes');
    // the slug...
    delete_option("guerrilla_legal_pages_page_name");
    add_option("guerrilla_legal_pages_page_name", $the_page_name, '', 'yes');
    // the id...
    delete_option("guerrilla_legal_pages_page_id");
    add_option("guerrilla_legal_pages_page_id", '0', '', 'yes');

    $the_page = get_page_by_title( $the_page_title );

    if ( ! $the_page ) {

        // Create post object
        $_p = array();
        $_p['post_title'] = $the_page_title;
        $_p['post_content'] = '
			<h3>1. INTRODUCTION</h3>
			<p><strong>1.1. PURPOSE OF POLICY.</strong> '. $sitename .' ("us", "we," "Company") is committed to respecting the privacy rights of visitors and other users of '. $sitename .' (the "Site"). We created this Privacy Policy (this "Policy") to give you confidence as you visit and use the Site, and to demonstrate our commitment to fair information practices. This Policy is only applicable to the Site, and not to any other websites that you may be able to access from the Site, each of which may have data collection and use practices and policies that differ materially from this Policy.</p>
			<p><strong>1.2. NOTICE CONCERNING CHILDREN</strong></p>
			<p>PLEASE NOTE: We are a general audience site, and do not direct any of our content specifically at children under 13 years of age pursuant to the Children’s Online Privacy Protection Act of 1998.</p>
			<h3>2. INFORMATION COLLECTION PRACTICES</h3>
			<p><strong>2.1. WHAT BASIC INFORMATION DOES THE COMPANY COLLECT?</strong></p>
			<p>In operating the Site, we collect personal information from you in a couple different situations. The first is if you should contact us via the "contact" page. In doing so, you will provide us with your name and email address. The second is if you leave a comment to a blog post during which you may be asked for a name and other information. You are not required to provide us with information via these two methods to use and enjoy the Site. </p>
			<p><strong>2.2. WHAT ADDITIONAL INFORMATION DOES COMPANY COLLECT?</strong></p>
			<p>(a) AUTOMATIC COLLECTION. Our servers automatically recognize visitors’ domain names and IP addresses (the number assigned to computers on the Internet). No personal information about you is revealed in this process. The Site may also gather anonymous "traffic data" that does not personally identify you, but that may be helpful for marketing purposes or for improving the services we offer.</p>
			<p>(b) COOKIES. From time to time, we may use the standard "cookies" feature of major browser applications that allows us to store a small piece of data on your computer about your visit to our Site. Cookies help us learn which areas of our Site are useful and which areas need improvement through programs including, but not limited to, Google Analytics. We may also use cookies from third party social sites and programs including, but not limited to, Facebook, Google Plus and Twitter. You can choose to disable cookies through your browser or independent programs available online. However, if you choose to disable this function, your experience at our Site may be diminished as some features may not work as they were intended.</p>
			<p>(c) SPONSORS AND ADVERTISERS. We may decide to accept sponsorship and advertisements on the Site. Should this occur, you should assume said sponsors and advertisers will be given access to the impressions and click data on their marketing pieces. Your personally identifiable information will never be revealed to them by us. </p>
			<h3>3. USE AND SHARING OF INFORMATION</h3>
			<p><strong>3.1. WHAT DOES COMPANY DO WITH COLLECTED INFORMATION?</strong></p>
			<p>(a) PERSONAL INFORMATION. We do not disclose the personally identifiable information to any third parties other than those that we use to facilitate the functioning of the site such as a hosting company and email program for mailings. </p>
			<p>(b) ANONYMOUS INFORMATION. We use anonymous information to analyze our Site traffic. In addition, we may use anonymous IP addresses to help diagnose problems with our server, to administer our site, or to display the content according to your preferences. Traffic and transaction information may also be shared with business partners and advertisers on an aggregate and anonymous basis.</p>
			<p>(c) USE OF COOKIES. Promotions or advertisements displayed on our site may contain cookies. We do not have access to or control over information collected by outside advertisers on our site.</p>
			<p>(d) DISCLOSURE OF PERSONAL INFORMATION. We may disclose any information we have for you if required to do so by law or in the good-faith belief that such action is necessary to (1) conform to the edicts of the law or comply with legal process served on us, (2) protect and defend our rights or property or the users of the Site, or (3) act under exigent circumstances to protect the safety of the public or users of the Site.</p>
			<p>(e) SALE OF INFORMATION. In order to accommodate changes in our business, we may sell or buy portions of the Site or our company, including the information collected through this Site. If Company or substantially all of its assets are acquired by a third party, user information will be one of the assets transferred to the acquirer.</p>
			<h3>4. SECURITY</h3>
			<p>The Site has security measures in place to prevent the loss, misuse, and alteration of the information that we obtain from you, but we make no assurances about our ability to prevent any such loss to you or to any third party arising out of any such loss, misuse, or alteration.</p>
			<h3>5. WEBSITE AREAS BEYOND COMPANY’S CONTROL</h3>
			<p><strong>5.1. THIRD PARTY WEBSITES</strong></p>
			<p>From time-to-time, the Site may contain links to other websites. If you choose to visit those websites, it is important to understand our privacy practices and terms of use do not extend to those sites. It is your responsibility to review the privacy policies at those websites to confirm that you understand and agree with their practices.</p>
			<h3>6. CONTACT INFORMATION AND POLICY UPDATES</h3>
			<p><strong>6.1. CONTACTING US</strong></p>
			<p>If you have any questions about this Policy or our practices related to this Site, please feel contact us using the "Contact" link on the menu located at the top of the site. </p>
			<p><strong>6.2. UPDATES AND CHANGES</strong></p>
			<p>We reserve the right, at any time, to add to, change, update, or modify this Policy to reflect changes in our Privacy Policy. We shall post any such changes on the Site in a conspicuous area. You may then choose whether you wish to accept said policy changes or discontinue using the Site. Any such change, update, or modification will be effective 30 days after posting on the Site. It is your responsibility to review this Policy from time to time to ensure that you continue to agree with all of its terms.</p>
			<p>(a) If you have signed up for email communications from us, we will notify you of the privacy policy changes by email as well. </p>
		';
        $_p['post_status'] = 'publish';
        $_p['post_type'] = 'page';
        $_p['comment_status'] = 'closed';
        $_p['ping_status'] = 'closed';
        $_p['post_category'] = array(1); // the default 'Uncatrgorised'

        // Insert the post into the database
        $the_page_id = wp_insert_post( $_p );

    }
    else {
        // the plugin may have been previously active and the page may just be trashed...
        $the_page_id = $the_page->ID;

        //make sure the page is not trashed...
        $the_page->post_status = 'publish';
        $the_page_id = wp_update_post( $the_page );

    }

    delete_option( 'guerrilla_legal_pages_page_id' );
    add_option( 'guerrilla_legal_pages_page_id', $the_page_id );

}

// This is the function to remove the WORK page when the plugin is deactivated
function guerrilla_legal_pages_remove() {

    global $wpdb;

    $the_page_title = get_option( "guerrilla_legal_pages_page_title" );
    $the_page_name = get_option( "guerrilla_legal_pages_page_name" );

    //  the id of our page...
    $the_page_id = get_option( 'guerrilla_legal_pages_page_id' );
    if( $the_page_id ) {

        wp_delete_post( $the_page_id ); // this will trash, not delete

    }

    delete_option("guerrilla_legal_pages_page_title");
    delete_option("guerrilla_legal_pages_page_name");
    delete_option("guerrilla_legal_pages_page_id");

}

/* Runs when plugin is activated */
register_activation_hook(__FILE__,'guerrilla_legal_pages_dmca_install'); 
/* Runs on plugin deactivation*/
register_deactivation_hook( __FILE__, 'guerrilla_legal_pages_dmca_remove' );

function guerrilla_legal_pages_dmca_install() {

    global $wpdb;

    $the_page_title = 'DMCA Policy';
    $the_page_name = 'dmca-policy';
	$sitename = get_bloginfo( 'name' );

    // the menu entry...
    delete_option("guerrilla_legal_pages_dmca_page_title");
    add_option("guerrilla_legal_pages_dmca_page_title", $the_page_title, '', 'yes');
    // the slug...
    delete_option("guerrilla_legal_pages_dmca_page_name");
    add_option("guerrilla_legal_pages_dmca_page_name", $the_page_name, '', 'yes');
    // the id...
    delete_option("guerrilla_legal_pages_dmca_page_id");
    add_option("guerrilla_legal_pages_dmca_page_id", '0', '', 'yes');

    $the_page = get_page_by_title( $the_page_title );

    if ( ! $the_page ) {

        // Create post object
        $_p = array();
        $_p['post_title'] = $the_page_title;
        $_p['post_content'] = '	
			<h3>Digital Millennium Copyright Act Policy</h3>
			<p>We respect the intellectual property rights of others just as we expect others to respect our rights. Pursuant to Digital Millennium Copyright Act, Title 17, United States Code, Section 512(c), a copyright owner or their agent may submit a takedown notice to us via our DMCA Agent listed below. As an internet service provider, we are entitled to claim immunity from said infringement claims pursuant to the “safe harbor” provisions of the DMCA. To submit a good faith infringement claim to us, you must submit notice to us that sets forth the following information:</p>
			<p><strong>Notice of Infringement – Claim</strong></p>
			<p>1. A physical or electronic signature of the copyright owner (or someone authorized to act on behalf of the owner);<br>
			2. Identification of the copyrighted work claimed to have been infringed;<br>
			3. Identification of the infringing material to be removed, and information reasonably sufficient to permit the service provider to locate the material. [Please submit the URL of the page in question to assist us in identifying the allegedly offending work];<br>
			4. Information reasonably sufficient to permit the service provider to contact the complaining party including your name, physical address, email address, phone number and fax number;<br>
			5. A statement that the complaining party has a good faith belief that the use of the material is unauthorized by the copyright agent; and<br>
			6. A statement that the information in the notification is accurate, and, under penalty of perjury, that the complaining party is authorized to act on behalf of the copyright owner. </p>
			<p>Title 17 USC §512(f) provides civil damage penalties, including costs and attorney fees, against any person who knowingly and materially misrepresents certain information in a notification of infringement under 17 USC §512(c)(3).</p>
			<p>Send all takedown notices through our Contact page. Please send by email for prompt attention.</p>
			<p>Please note that we may share the identity and information in any copyright infringement claim we receive with the alleged infringer. In submitting a claim, you understand accept and agree that your identity and claim may be communicated to the alleged infringer.</p>
			<p><strong>Counter Notification – Restoration of Material</strong></p>
			<p>If you have received a notice of material being takedown because of a copyright infringement claim, you may provide us with a counter notification in an effort to have the material in question restored to the site. Said notification must be given in writing to our DMCA Agent and must contain substantially the following elements pursuant to 17 USC Section 512(g)(3):</p>
			<p>1. Your physical or electronic signature.<br>
			2. A description of the material that has been taken down and the original location of the material before it was taken down.<br>
			3. A statement under penalty of perjury that you have a good faith belief that the material was removed or disabled as a result of mistake or misidentification of the material to be removed or disabled.<br>
			4. Your name, address, and telephone number, and a statement that you consent to the jurisdiction of the federal district court for the judicial district in which the address is located (or if you are outside of the United States, that you consent to jurisdiction of any judicial district in which the service provider may be found), and that the you will accept service of process from the person or company who provided the original infringement notification.<br>
			5. Send your counter notice through our Contact page. Email is highly recommended. </p>
			<p><strong>Repeat Infringer Policy</strong></p>
			<p>We take copyright infringement very seriously. Pursuant to the repeat infringer policy requirements of the Digital Millennium Copyright Act, we maintain a list of DMCA notices from copyright holders and make a good faith effort to identify any repeat infringers. Those that violate our internal repeat infringer policy will have their accounts terminated.</p>
			<p><strong>Modifications</strong></p>
			<p>We reserve the right to modify the contents of this page and its policy for handling DMCA claims at any time for any reason. You are encouraged to check back to review this policy frequently for any changes. </p>

		';
        $_p['post_status'] = 'publish';
        $_p['post_type'] = 'page';
        $_p['comment_status'] = 'closed';
        $_p['ping_status'] = 'closed';
        $_p['post_category'] = array(1); // the default 'Uncatrgorised'

        // Insert the post into the database
        $the_page_id = wp_insert_post( $_p );

    }
    else {
        // the plugin may have been previously active and the page may just be trashed...
        $the_page_id = $the_page->ID;

        //make sure the page is not trashed...
        $the_page->post_status = 'publish';
        $the_page_id = wp_update_post( $the_page );

    }

    delete_option( 'guerrilla_legal_pages_dmca_page_id' );
    add_option( 'guerrilla_legal_pages_dmca_page_id', $the_page_id );

}

// This is the function to remove the WORK page when the plugin is deactivated
function guerrilla_legal_pages_dmca_remove() {

    global $wpdb;

    $the_page_title = get_option( "guerrilla_legal_pages_dmca_page_title" );
    $the_page_name = get_option( "guerrilla_legal_pages_dmca_page_name" );

    //  the id of our page...
    $the_page_id = get_option( 'guerrilla_legal_pages_dmca_page_id' );
    if( $the_page_id ) {

        wp_delete_post( $the_page_id ); // this will trash, not delete

    }

    delete_option("guerrilla_legal_pages_dmca_page_title");
    delete_option("guerrilla_legal_pages_dmca_page_name");
    delete_option("guerrilla_legal_pages_dmca_page_id");

}

/* Runs when plugin is activated */
register_activation_hook(__FILE__,'guerrilla_legal_terms_pages_install'); 
/* Runs on plugin deactivation*/
register_deactivation_hook( __FILE__, 'guerrilla_legal_terms_pages_remove' );

function guerrilla_legal_terms_pages_install() {

    global $wpdb;

    $the_page_title = 'Terms of Use';
    $the_page_name = 'terms-of-use';
	$sitename = get_bloginfo( 'name' );
	$siteurl = get_bloginfo( 'url' );

    // the menu entry...
    delete_option("guerrilla_legal_terms_pages_page_title");
    add_option("guerrilla_legal_terms_pages_page_title", $the_page_title, '', 'yes');
    // the slug...
    delete_option("guerrilla_legal_terms_pages_page_name");
    add_option("guerrilla_legal_terms_pages_page_name", $the_page_name, '', 'yes');
    // the id...
    delete_option("guerrilla_legal_terms_pages_page_id");
    add_option("guerrilla_legal_terms_pages_page_id", '0', '', 'yes');

    $the_page = get_page_by_title( $the_page_title );

    if ( ! $the_page ) {

        // Create post object
        $_p = array();
        $_p['post_title'] = $the_page_title;
        $_p['post_content'] = '
			<p><strong>1. BINDING EFFECT.</strong> This is a binding agreement between you and '. $sitename .' ("us", "we", "Company"). By using the Internet site located at '. $siteurl .' (the "Site"), you agree to abide by these Terms of Use. If at any time you find these Terms of Use unacceptable, you must immediately leave the Site and cease all use of it.</p>
			<p><strong>2. PRIVACY POLICY.</strong> We respect your privacy and permit you to control the treatment of your personal information. A complete statement of our current privacy policy can be found by <a href="/privacy-policy/">clicking here</a>. Our privacy policy is expressly incorporated into this Agreement by this reference.</p>
			<p><strong>3. GOVERNING LAW.</strong> These Terms of Use shall be construed in accordance with and governed by the laws of California and the United States, without reference to rules regarding conflicts of law. This Site is intended for use by individuals based in the United States of America.</p>
			<p><strong>4. MINIMUM AGE.</strong> You must be at least 18 years old to access and participate on this site. You guarantee and warrant you are at least 18 years old and are able to enter into this Agreement from a legal perspective.</p>
			<p><strong>5. EBOOK SIGNUPS AND MAILINGS.</strong> You have the option, but not obligation, to sign up and receive a free eBook from us. Should you do so, you are agreeing to receive further emailings from us of a commercial nature.</p>
			<p><strong>6. EMAIL COMMUNICATIONS.</strong> When you contact us, you expressly consent and agree to receive email responses from us. These email communications may be commercial or non-commercial in nature. Non-commercial emails may include, but are not limited to, administrative issues and announcements of changes to these Terms, the Privacy Policy or other site documentation.</p>
			<p><strong>7. USE OF SOFTWARE.</strong> Company may make certain software available to you from the Site. If you download software from the Site, the software, including all files and images contained in or generated by the software, and accompanying data (collectively, "Software") are deemed to be licensed to you by Company, for your personal, noncommercial, home use only. Company does not transfer either the title or the intellectual property rights to the Software, and Company retains full and complete title to the Software as well as all intellectual property rights therein. You may not sell, redistribute, or reproduce the Software, nor may you decompile, reverse-engineer, disassemble, or otherwise convert the Software to a human-perceivable form. All trademarks and logos are owned by Company or its licensors and you may not copy or use them in any manner.</p>
			<p><strong>8. USER CONTENT.</strong> By posting, downloading, displaying, performing, transmitting, or otherwise distributing information or other content ("User Content") to the site, you are granting Company, its affiliates, officers, directors, employees, consultants, agents, and representatives a permanent, non-exclusive license to use User Content in connection with the operation of the Internet businesses of Company, its affiliates, officers, directors, employees, consultants, agents, and representatives, including without limitation, a right to copy, distribute, transmit, publicly display, publicly perform, reproduce, edit, translate, and reformat User Content. You will not be compensated for any User Content. You agree that Company may publish or otherwise disclose your name in connection with your User Content. By posting User Content on the site, you warrant and represent that you own the rights to the User Content or are otherwise authorized to post, distribute, display, perform, transmit, or otherwise distribute User Content.</p>
			<p><strong>9. COMPLIANCE WITH INTELLECTUAL PROPERTY LAWS.</strong> When accessing the site, you agree to respect the intellectual property rights of others. Your use of the site is at all times governed by and subject to laws regarding copyright ownership and use of intellectual property. You agree not to upload, download, display, perform, transmit, or otherwise distribute any information or content (collectively, "Content") in violation of any third party’s copyrights, trademarks, or other intellectual property or proprietary rights. You agree to abide by laws regarding copyright ownership and use of intellectual property, and you shall be solely responsible for any violations of any relevant laws and for any infringements of third party rights caused by any Content you provide or transmit, or that is provided or transmitted using your User ID. The burden of proving that any Content does not violate any laws or third party rights rests solely with you. All Digital Millennium Copyright Act matters are processed pursuant to our DMCA Policy, which you may access via the DMCA link at the bottom of the page.</p>
			<p><strong>10. INAPPROPRIATE CONTENT.</strong> You agree not to upload, download, display, perform, transmit, or otherwise distribute any Content that (a) is libelous, defamatory, obscene, pornographic, abusive, or threatening; (b) advocates or encourages conduct that could constitute a criminal offense, give rise to civil liability, or otherwise violate any applicable local, state, national, or foreign law or regulation; (c) advertises or otherwise solicits funds or is a solicitation for goods or services; or (d) provides medical advice to other users. Company reserves the right to terminate your receipt, transmission, or other distribution of any such material using the site, and, if applicable, to delete any such material from its servers. Company intends to cooperate fully with any law enforcement officials or agencies in the investigation of any violation of these Terms or of any applicable laws.</p>
			<p><strong>11. COMPLIANCE WITH INTELLECTUAL PROPERTY LAWS.</strong> When accessing the Site, you agree to obey the law and to respect the intellectual property rights of others. Your use of the Site is at all times governed by and subject to laws regarding copyright ownership and use of intellectual property. You agree not to upload, download, display, perform, transmit, or otherwise distribute any information or content (collectively, "Content") in violation of any third party’s copyrights, trademarks, or other intellectual property or proprietary rights. You agree to abide by laws regarding copyright ownership and use of intellectual property, and you shall be solely responsible for any violations of any relevant laws and for any infringements of third party rights caused by any Content you provide or transmit, or that is provided or transmitted using your account. The burden of proving that any Content does not violate any laws or third party rights rests solely with you.</p>
			<p><strong>12. NO WARRANTIES.</strong> WE HEREBY DISCLAIM ALL WARRANTIES. WE ARE MAKING THE SITE AVAILABLE "AS IS" WITHOUT WARRANTY OF ANY KIND. YOU ASSUME THE RISK OF ANY AND ALL DAMAGE OR LOSS FROM USE OF, OR INABILITY TO USE, THE SITE OR THE SERVICE. TO THE MAXIMUM EXTENT PERMITTED BY LAW, WE EXPRESSLY DISCLAIM ANY AND ALL WARRANTIES, EXPRESS OR IMPLIED, REGARDING THE SITE, INCLUDING, BUT NOT LIMITED TO, ANY IMPLIED WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE, OR NONINFRINGEMENT. WE DO NOT WARRANT THAT THE SITE OR THE SERVICE WILL MEET YOUR REQUIREMENTS OR THAT THE OPERATION OF THE SITE OR THE SERVICE WILL BE UNINTERRUPTED OR ERROR-FREE.</p>
			<p><strong>13. LIMITED LIABILITY.</strong> OUR LIABILITY TO YOU IS LIMITED. TO THE MAXIMUM EXTENT PERMITTED BY LAW, IN NO EVENT SHALL WE BE LIABLE FOR DAMAGES OF ANY KIND (INCLUDING, BUT NOT LIMITED TO, SPECIAL, INCIDENTAL, OR CONSEQUENTIAL DAMAGES, LOST PROFITS, OR LOST DATA, REGARDLESS OF THE FORESEEABILITY OF THOSE DAMAGES) ARISING OUT OF OR IN CONNECTION WITH YOUR USE OF THE SITE OR ANY OTHER MATERIALS OR SERVICES PROVIDED TO YOU BY US. This limitation shall apply regardless of whether the damages arise out of breach of contract, tort, or any other legal theory or form of action.</p>
			<p><strong>14. AFFILIATED SITES.</strong> We have no control over and no liability for any third party websites or materials. We work with a number of partners whose Internet sites may be linked with the Site. Because we have no control over the content and performance of these partner and affiliate sites, we make no guarantees about the accuracy, currency, content, or quality of the information provided by such sites, and we assume no responsibility for unintended, objectionable, inaccurate, misleading, or unlawful content that may reside on those sites. Similarly, from time to time in connection with your use of the Site, you may have access to content items (including, but not limited to, websites) that are owned by third parties. You acknowledge and agree that we make no guarantees about, and assumes no responsibility for, the accuracy, currency, content, or quality of this third party content, and that, unless expressly provided otherwise, these Terms of Use shall govern your use of any and all third party content.</p>
			<p><strong>15. PROHIBITED USES.</strong> We impose certain restrictions on your permissible use of the Site. You are prohibited from violating or attempting to violate any security features of the Site, including, without limitation, (a) accessing content or data not intended for you, or logging onto a server or account that you are not authorized to access; (b) attempting to probe, scan, or test the vulnerability of the Site, or any associated system or network, or to breach security or authentication measures without proper authorization; (c) interfering or attempting to interfere with service to any user, host, or network, including, without limitation, by means of submitting a virus to the Site, overloading, "flooding," "spamming," "mail bombing," "crashing" or instituting a "DDOS" attack on the Site; (d) using the Site to send unsolicited e-mail, including, without limitation, promotions, or advertisements for products or services; (e) forging any TCP/IP packet header or any part of the header information in any e-mail or in any posting using the Site; or (f) attempting to modify, reverse-engineer, decompile, disassemble, or otherwise reduce or attempt to reduce to a human-perceivable form any of the source code used by us in providing the Site. Any violation of system or network security may subject you to civil and/or criminal liability.</p>
			<p><strong>16. INDEMNITY.</strong> You agree to indemnify us for certain of your acts and omissions. You agree to indemnify, defend, and hold harmless Company, its affiliates, officers, directors, employees, consultants, agents, and representatives from any and all third party claims, losses, liability, damages, and/or costs (including reasonable attorney fees and costs) arising from your access to or use of the Site, your violation of these Terms of Use, or your infringement, or infringement by any other user of your account, of any intellectual property or other right of any person or entity. We will notify you promptly of any such claim, loss, liability, or demand, and will provide you with reasonable assistance, at your expense, in defending any such claim, loss, liability, damage, or cost.</p>
			<p><strong>17. COPYRIGHT.</strong> All contents of Site or Service are: Copyright &copy; ' . date(Y) .' '. $sitename .'.</p>
			<p><strong>18. SEVERABILITY; WAIVER.</strong> If, for whatever reason, a court of competent jurisdiction finds any term or condition in these Terms of Use to be unenforceable, all other terms and conditions will remain unaffected and in full force and effect. No waiver of any breach of any provision of these Terms of Use shall constitute a waiver of any prior, concurrent, or subsequent breach of the same or any other provisions hereof, and no waiver shall be effective unless made in writing and signed by an authorized representative of the waiving party.</p>
			<p><strong>19. NO LICENSE.</strong> Nothing contained on the Site should be understood as granting you a license to use any of the trademarks, service marks, or logos owned by us or by any third party.</p>
			<p><strong>20. UNITED STATES USE ONLY.</strong> The Site is controlled and operated by Company from its offices in the State of California. The domain of the website is registered in the United States and the Site is hosted in the United States. The intended audience for this site consists of individuals in the United States only. Company makes no representation that any of the materials or the services to which you have been given access are available or appropriate for use in other locations. Your use of or access to the Site should not be construed as Company’s purposefully availing itself of the benefits or privilege of doing business in any state or jurisdiction other than California and the United States.</p>
			<p><strong>21. AMENDMENTS.</strong> Company reserves the right to amend these Terms. Should Company seek to make such an amendment, which we determine is material in our sole discretion, we shall:</p>
			<p>(a) Provide you notice by email of said change 15 days prior to the change going into force, and<br>
			(b) Publish on the home page the fact an amendment will be made.</p>
			<p>Should a court of competent jurisdiction rule this Amendment provision invalid, then this Amendment clause shall be terminated as part of this agreement. All amendments to the Terms shall be forward looking.</p>
		';
        $_p['post_status'] = 'publish';
        $_p['post_type'] = 'page';
        $_p['comment_status'] = 'closed';
        $_p['ping_status'] = 'closed';
        $_p['post_category'] = array(1); // the default 'Uncatrgorised'

        // Insert the post into the database
        $the_page_id = wp_insert_post( $_p );

    }
    else {
        // the plugin may have been previously active and the page may just be trashed...
        $the_page_id = $the_page->ID;

        //make sure the page is not trashed...
        $the_page->post_status = 'publish';
        $the_page_id = wp_update_post( $the_page );

    }

    delete_option( 'guerrilla_legal_terms_pages_page_id' );
    add_option( 'guerrilla_legal_terms_pages_page_id', $the_page_id );

}

// This is the function to remove the WORK page when the plugin is deactivated
function guerrilla_legal_terms_pages_remove() {

    global $wpdb;

    $the_page_title = get_option( "guerrilla_legal_terms_pages_page_title" );
    $the_page_name = get_option( "guerrilla_legal_terms_pages_page_name" );

    //  the id of our page...
    $the_page_id = get_option( 'guerrilla_legal_terms_pages_page_id' );
    if( $the_page_id ) {

        wp_delete_post( $the_page_id ); // this will trash, not delete

    }

    delete_option("guerrilla_legal_terms_pages_page_title");
    delete_option("guerrilla_legal_terms_pages_page_name");
    delete_option("guerrilla_legal_terms_pages_page_id");

}

?>