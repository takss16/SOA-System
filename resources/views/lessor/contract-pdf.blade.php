<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contract of Lease</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            text-align: justify;
        }
        ol {
            padding-left: 30px;
        }
        li {
            margin-bottom: 30px;
        }
        p {
            margin-bottom: 30px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        .title {
            text-align: center;
        }

        .section-title {
            margin-top: 20px;
            margin-bottom: 20px;
        }
        .indent {
            text-indent: 40px;
        }
        .page-break {
            page-break-before: always;
        }
    </style>
</head>
<body>
    <h3 class="title">CONTRACT OF LEASE</h3>
    <div class="container">
        <p><b>KNOW ALL MEN BY THESE PRESENTS:</b></p>

        <p>This CONTRACT OF LEASE is made and executed at the City of Mabalacat, this day of <b>{{ \Carbon\Carbon::parse($contract->contract_date)->format('F d, Y') }}</b>
            by and between:</p>

        <p class="indent" >
            <b>{{ $contract->lessor->lessorProfiles->first_name }}
                {{ $contract->lessor->lessorProfiles->middle_name }}
                {{ $contract->lessor->lessorProfiles->last_name }}</b>
                , of legal age, married to Enrique M. David, Filipino, and with
                 residence and postal address at
                 <b>{{ $contract->lessor->lessorProfiles->street }},
                {{ $contract->lessor->lessorProfiles->barangay }},
                {{ $contract->lessor->lessorProfiles->city}},
                {{ $contract->lessor->lessorProfiles->province}}</b>
                , hereinafter referred to as the LESSOR.
        </p>
        <h3 class="title">-AND-</h3>
        <p class="indent" >
            <b>{{ $contract->lesseeProfile->first_name }}
            {{ $contract->lesseeProfile->middle_name }}
            {{ $contract->lesseeProfile->last_name }}</b>
            , Filipino and with residence and postal address at
             <b>{{ $contract->lesseeProfile->street }},
                {{ $contract->lesseeProfile->barangay }},
                {{ $contract->lesseeProfile->city}},
                {{ $contract->lesseeProfile->province}}</b>
                , hereinafter referred to as the LESSEE.
        </p>
        <h3 class="title">WITNESSETH:</h3>

        <p> <b>WHEREAS,</b> the <b>LESSOR</b>  is the owner of THE LEASED PREMISES, a commercial
            property situated at
            <b>{{ $contract->property->lot }},
                {{ $contract->property->block }},
                {{ $contract->property->subdivision }},
                {{ $contract->property->city_town}}
                {{ $contract->property->province}}</b>, a copy of which is attached herein as Annex "A".</p>

        <p><b>WHEREAS,</b> the <b>LESSEE</b> agrees to lease
            <b>{{ $contract->property->property_description}}</b> of the aforementioned Leased Premises from the LESSOR;</p>

        <p><b>NOW THEREFORE,</b> for and in consideration of the foregoing premises, the LESSOR hereby leases upon the LESSEE the
            <b>{{ $contract->property->property_description}}</b> of the Leased Premises and the LESSEE hereby accepts the same, under the following terms and conditions:</p>


        <h3 class="title">TERMS AND CONDITIONS</h3>
        <ol>
            <li>
                <strong>PURPOSES:</strong> That the leased premises shall be used exclusively by the LESSEE for commercial purposes only and shall not be diverted to other uses. It is hereby expressly agreed that if at any time the premises are used for other purposes, the LESSOR shall have the right to rescind this contract without prejudice to its other rights under the law.
            </li>
            <li>
                <strong>LEASE TERM:</strong> This term of lease is
                <b>{{ $contract->contract_terms}}</b> commencing on <b>{{ \Carbon\Carbon::parse($contract->lease_term_start_date)->format('F d, Y') }}</b>
                and expiring on<b>{{ \Carbon\Carbon::parse($contract->lease_term_end_date)->format('F d, Y') }}</b>. Upon its expiration, the lease may be renewed under such terms and conditions mutually agreed upon by both parties; written notice of intention to renew the lease shall be served to the LESSOR not later than one (1) month prior to the above stated expiry date. Pre-termination of the lease shall result in the forfeiture of the deposit stated in number 4 hereof.
            </li>
            <li>
                <strong>RENTAL RATE:</strong> The monthly rental rate for the leased premises shall be in PESOS: fifteen thousand (P <b>{{ $contract->rental_rate}}</b>), Philippine Currency. All rental payments shall be payable to the LESSOR.
            </li>
            <li>
                <strong>DEPOSIT:</strong> The LESSEE shall deposit to the LESSOR upon signing of this contract and prior to move-in an amount equivalent to the rent for two (2) months or the sum of PESOS: thirty thousand (P 30,000.00), Philippine Currency. Wherein the one (1) month.
            </li>
            <li><strong>DEFAULT PAYMENT:</strong> In case of default by the LESSEE in the payment of the rent, such as when the checks are dishonored, the LESSOR has the option to terminate this contract and eject the LESSEE. The LESSOR has the right to padlock the premises when the LESSEE is in default of payment for one (1) month and may forfeit whatever rental deposit or advances have been given by the LESSEE.</li>
            <li><strong>SUB-LEASE:</strong> The LESSEE shall not directly or indirectly sublet, allow or permit the Leased Premises to be occupied in whole or in part by any person, form, or corporation, neither shall the LESSEE assign its rights hereunder to any other person or entity and no right of interest thereto or therein shall be conferred on or vested in anyone by the LESSEE without the LESSOR'S written approval.</li>
            <li><strong>PUBLIC UTILITIES:</strong> The LESSEE shall pay for its telephone, electric, cable TV, water, Internet, association dues, and other public services and utilities during the duration of the lease. The LESSOR is not responsible for any payments, penalties, reconnection, or realignment which will incur due to the Tenant’s noncompliance or nonpayment of the said bills or will be charged to the LESSEE accordingly.</li>
            <li><strong>OCCUPANCY:</strong> The LESSEE warrants that he will meet the above conditions in every respect and acknowledges that failure to perform the obligations herein stipulated will be considered grounds for termination of this contract and loss of any or all deposits. LESSEE to maintain dwelling unit as follows:
                <ol style="margin-top: 5px;">
                    <li>Comply with all obligations primarily imposed upon LESSEE by applicable provisions of building codes materially affecting health and safety.</li>
                    <li>Dispose from his dwelling unit all rubbish, garbage, and other waste in a clean and safe manner.</li>
                    <li>Use in a reasonable manner all electrical, plumbing, sanitary, heating, ventilating, air-conditioning, and other facilities and appliances.</li>
                    <li>Not deliberately or negligently destroy, deface, damage, impair, or remove any part of the Leased Premises or knowingly permit any person to do so.</li>
                    <li>Shall not keep nor store in the Leased Premises any hazardous or inflammable material or substance that may constitute a fire hazard.</li>
                </ol>
            </li>
            <li><strong>CONDITION OF PREMISES:</strong> The LESSEE acknowledges that the said property is in good condition. If there is anything about the condition of the property that is not good, they agree to report it to the LESSOR within 3 days of taking possession of the unit.</li>
            <li><strong>TENANT INSURANCE:</strong> The LESSEE agrees to hold the LESSOR harmless from any liability by reason of personal injury to any person and for property damage occurring on or about or connected with the Leased Premises or resulting from the LESSEE use thereof. The LESSEE hereby acknowledges this and agrees to make no such claims for any losses or damages against the LESSOR.</li>
            <li><strong>FORCE MAJEURE:</strong> If whole or any part of the Leased Premises shall be destroyed or damaged by fire, flood, lightning, typhoon, earthquake, storm, riot, or any other unforeseen disabling cause of acts of God, as to render the leased premises during the term substantially unfit for use and occupation of the LESSEE, then this lease contract may be terminated without compensation by the LESSOR or by the LESSEE by notice in writing to the other.</li>
            <li><strong>LESSOR'S RIGHT OF ENTRY:</strong> The LESSOR or its authorized agent shall after giving due notice to the LESSEE shall have the right to enter the Leased Premises in the presence of the LESSEE or its representative at any reasonable hour to examine the same or make repairs therein or for the operation and maintenance of the building or to exhibit the Leased Premises to prospective LESSEE, or for any other lawful purposes which it may deem necessary.</li>
            <li><strong>EXPIRATION OF LEASE:</strong> At the expiration of the term of this lease or cancellation thereof, as herein provided, the LESSEE will promptly deliver to the LESSOR the Leased Premises with all corresponding keys and is the same or in as good and tenable condition upon first occupancy, ordinary wear and tear expected devoid of all occupants, movable furniture, articles, and effects of any kind. Non-compliance with the terms of this clause by the LESSEE will give the LESSOR the right, at the latter's option, to refuse to accept the delivery of the premises and compel the LESSEE to pay rent therefrom at the same rate plus Twenty Five (25) % thereof as penalty until the LESSEE shall have complied with the terms hereof. The same penalty shall be imposed in case the LESSEE fails to leave the premises after the expiration of this Contract of Lease or termination for any reason whatsoever.</li>
            <li><strong>JUDICIAL RELIEF:</strong> Should any one of the parties herein be compelled to seek judicial relief against the other, the losing party shall pay an amount of One Hundred (100) % of the amount claimed in the complaint as attorney's</li>
            <li>The <strong>CONTRACT OF LEASE</strong>  shall be valid and binding between the parties, theirsuccessors-in-interest and assigns.</li>
        </ol>
        <p style="text-align: center;"><strong>IN WITNESS WHEREOF,</strong> parties herein affixed their signatures on the date and place above written.</p>
        <table style="width: 100%;">
            <tr>
                <td style="text-align: center;">
                    <b>{{ $contract->lessor->lessorProfiles->first_name }}
                        {{ $contract->lessor->lessorProfiles->middle_name }}
                        {{ $contract->lessor->lessorProfiles->last_name }}
                    </b>
                </td>
                <td style="text-align: center;">
                    <b>{{ $contract->lesseeProfile->first_name }}
                    {{ $contract->lesseeProfile->middle_name }}
                    {{ $contract->lesseeProfile->last_name }}
                </b>
                </td>
            </tr>
            <tr>
                <td style="text-align: center;">LESSOR</td>
                <td style="text-align: center;">LESSEE</td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center;">Signed in the presence of:</td>
            </tr>
            <tr>
                <td style="text-align: center;">_____________________________</td>
                <td style="text-align: center;">_____________________________</td>
            </tr>
        </table>
    </div>
    <div class="page-break"></div>
    <h3 class="title">ACKNOWLEDGEMENT</h3>

<p>Republic of the Philippines)<br>_________________________) S.S</p>
<p>BEFORE ME, personally appeared:</p>

<table style="width: 100%; text-align: center;">
    <tr style="margin-bottom: 30px;">
        <th>Name</th>
        <th>ID Number</th>
        <th>Date</th>
    </tr>

    <tr>
        <td >Nora O. David</td>
        <td >Senior ID: MB-1610</td>
        <td>January 3, 2022</td>
    </tr>
    <tr>
        <td >Angelo A. Tarun</td>
        <td >Passport: P8810427A</td>
        <td>September 20, 20</td>
    </tr>
</table>


<p>Known to me and to me known to be the same persons who executed the foregoing<br>instrument and acknowledged to me that the same is their free and voluntary act<br>and deed.</p>
<p>This instrument consisting of ____ page/s, including the page on which this<br>acknowledgement is written, has been signed on each and every page thereof by the<br>concerned parties and their witnesses, and sealed with my notarial seal.</p>
<p>WITNESS MY HAND AND SEAL, on the date and place first above written.</p>
<p>Notary Public<br>Doc. No.______;<br>Page No. ______;<br>Book No.______;</p>

</body>
</html>
