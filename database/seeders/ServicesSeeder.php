<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $services = [
            // Agriculture and Food Production (index 1)
    ["Crop Irrigation Systems", 1],
    ["Livestock Feed Supplements", 1],
    ["Crop Protection Chemicals", 1],
    ["Precision Farming Technology", 1],
    ["Food Packaging Solutions", 1],
    ["Farm Machinery Repair Services", 1],
    ["Organic Farming Consultation", 1],

    // Artificial Intelligence and Data Analytics (index 2)
    ["Machine Learning Algorithms", 2],
    ["Predictive Analytics Services", 2],
    ["Data Visualization Tools", 2],
    ["Natural Language Processing", 2],
    ["AI-driven Customer Support", 2],
    ["Big Data Consulting", 2],
    ["Sentiment Analysis Solutions", 2],

    // Creative Industries (index 3)
    ["Graphic Design Services", 3],
    ["Video Production Studios", 3],
    ["Advertising Campaign Management", 3],
    ["Fashion Design Consultation", 3],
    ["Web Development Agencies", 3],
    ["Photography Studios", 3],
    ["Brand Identity Development", 3],

    // Education (index 4)
    ["Online Learning Platforms", 4],
    ["Tutoring Services", 4],
    ["Educational Software Development", 4],
    ["Language Learning Courses", 4],
    ["STEM Education Programs", 4],
    ["Student Counseling Services", 4],
    ["Corporate Training Workshops", 4],

    // Energy (index 5)
    ["Solar Panel Installation", 5],
    ["Oil and Gas Exploration", 5],
    ["Wind Turbine Maintenance", 5],
    ["Energy Efficiency Audits", 5],
    ["Renewable Energy Consulting", 5],
    ["Smart Grid Solutions", 5],
    ["Electric Vehicle Charging Stations", 5],

    // Environmental Services (index 6)
    ["Waste Management Solutions", 6],
    ["Environmental Impact Assessments", 6],
    ["Pollution Control Technologies", 6],
    ["Ecological Restoration Services", 6],
    ["Sustainable Development Planning", 6],
    ["Water Treatment Systems", 6],
    ["Climate Change Consulting", 6],

    // Finance (index 7)
    ["Financial Planning Services", 7],
    ["Investment Portfolio Management", 7],
    ["Insurance Brokerage", 7],
    ["Tax Preparation Services", 7],
    ["Audit and Assurance Services", 7],
    ["Mortgage Lending", 7],
    ["Venture Capital Funding", 7],

    // Government Services (index 8)
    ["Public Infrastructure Development", 8],
    ["Legislative Policy Analysis", 8],
    ["Citizen Engagement Platforms", 8],
    ["Government IT Solutions", 8],
    ["Public Health Programs", 8],
    ["Emergency Management Services", 8],
    ["Social Welfare Programs", 8],

    // Healthcare (index 9)
    ["Hospital Management Software", 9],
    ["Medical Device Manufacturing", 9],
    ["Healthcare Data Analytics", 9],
    ["Telemedicine Platforms", 9],
    ["Health Insurance Plans", 9],
    ["Clinical Laboratory Services", 9],
    ["Medical Imaging Solutions", 9],

    // Hospitality and Tourism (index 10)
    ["Hotel Booking Platforms", 10],
    ["Restaurant Management Software", 10],
    ["Tourist Guide Services", 10],
    ["Adventure Tour Packages", 10],
    ["Event Management Companies", 10],
    ["Cruise Ship Operators", 10],
    ["Travel Insurance Providers", 10],

    // Manufacturing (index 11)
    ["Automated Assembly Lines", 11],
    ["3D Printing Services", 11],
    ["Quality Control Systems", 11],
    ["Lean Manufacturing Consulting", 11],
    ["Custom Fabrication Services", 11],
    ["Supply Chain Management Software", 11],
    ["Industrial Equipment Maintenance", 11],

    // Media and Entertainment (index 12)
    ["Streaming Video Platforms", 12],
    ["Music Production Studios", 12],
    ["Event Ticketing Services", 12],
    ["Gaming Development Studios", 12],
    ["Digital Advertising Networks", 12],
    ["Celebrity Management Agencies", 12],
    ["Film Distribution Services", 12],

    // Nonprofit and Social Services (index 13)
    ["Community Outreach Programs", 13],
    ["Charitable Fundraising Platforms", 13],
    ["Social Impact Assessments", 13],
    ["Volunteer Management Software", 13],
    ["Disaster Relief Organizations", 13],
    ["Advocacy Campaign Management", 13],
    ["Homeless Shelter Services", 13],

    // Professional Services (index 14)
    ["Legal Advisory Services", 14],
    ["Management Consulting Firms", 14],
    ["Marketing Research Agencies", 14],
    ["Human Resources Consultation", 14],
    ["Translation and Localization Services", 14],
    ["Financial Risk Management", 14],
    ["IT Consulting Services", 14],

    // Real Estate (index 15)
    ["Property Development Projects", 15],
    ["Real Estate Brokerage Services", 15],
    ["Property Management Software", 15],
    ["Commercial Property Leasing", 15],
    ["Residential Construction Services", 15],
    ["Real Estate Investment Trusts (REITs)", 15],
    ["Home Inspection Services", 15],

    // Retail (index 16)
    ["E-commerce Platforms", 16],
    ["Brick-and-Mortar Store Design", 16],
    ["Inventory Management Software", 16],
    ["Customer Loyalty Programs", 16],
    ["Point-of-Sale (POS) Systems", 16],
    ["Online Marketplace Development", 16],
    ["Retail Analytics Solutions", 16],

    // Technology (index 17)
    ["Software Development Services", 17],
    ["Cloud Computing Solutions", 17],
    ["Cybersecurity Consultation", 17],
    ["Internet of Things (IoT) Devices", 17],
    ["Mobile App Development", 17],
    ["Blockchain Technology Solutions", 17],
    ["Augmented Reality Applications", 17],

    // Telecommunications (index 18)
    ["Fiber Optic Network Installation", 18],
    ["Mobile Network Optimization", 18],
    ["VoIP Telephony Solutions", 18],
    ["Satellite Communication Services", 18],
    ["Telecom Infrastructure Consulting", 18],
    ["Wireless Spectrum Management", 18],
    ["5G Network Deployment", 18],

    // Transportation and Logistics (index 19)
    ["Freight Forwarding Services", 19],
    ["Supply Chain Optimization", 19],
    ["Last-Mile Delivery Solutions", 19],
    ["Shipping Container Leasing", 19],
    ["Logistics Tracking Software", 19],
    ["Passenger Transportation Services", 19],
    ["Cross-Border Trade Facilitation", 19],
        ];

        foreach ($services as $service) {
            DB::table('services')->insert([
                'service_name' => $service[0],
                'industryId' => $service[1],
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}