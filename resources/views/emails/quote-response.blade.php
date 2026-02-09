<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quote Response</title>
</head>
<body style="margin: 0; padding: 0; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f8fafc;">
    <table width="100%" cellpadding="0" cellspacing="0" style="background-color: #f8fafc; padding: 40px 20px;">
        <tr>
            <td align="center">
                <table width="600" cellpadding="0" cellspacing="0" style="background-color: #ffffff; border-radius: 16px; overflow: hidden; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                    <!-- Header -->
                    <tr>
                        <td style="background: linear-gradient(135deg, #1e4b8e 0%, #0d2d5a 100%); padding: 30px; text-align: center;">
                            <h1 style="color: #ffffff; margin: 0; font-size: 24px;">PureDropCleaning</h1>
                            <p style="color: rgba(255,255,255,0.8); margin: 10px 0 0 0; font-size: 14px;">Professional Cleaning Services</p>
                        </td>
                    </tr>
                    
                    <!-- Content -->
                    <tr>
                        <td style="padding: 40px 30px;">
                            <h2 style="color: #0d2d5a; margin: 0 0 20px 0; font-size: 20px;">Hello {{ $quote->name }},</h2>
                            
                            <p style="color: #64748b; font-size: 16px; line-height: 1.6; margin: 0 0 20px 0;">
                                Thank you for your interest in our cleaning services. We have reviewed your quote request and here is our response:
                            </p>
                            
                            <!-- Response Box -->
                            <div style="background-color: #f0f9ff; border-left: 4px solid #1e4b8e; padding: 20px; border-radius: 0 8px 8px 0; margin: 20px 0;">
                                <p style="color: #0d2d5a; font-size: 15px; line-height: 1.8; margin: 0; white-space: pre-wrap;">{{ $quote->admin_response }}</p>
                            </div>
                            
                            <!-- Original Request -->
                            <div style="margin-top: 30px; padding-top: 20px; border-top: 1px solid #e2e8f0;">
                                <p style="color: #94a3b8; font-size: 12px; text-transform: uppercase; letter-spacing: 1px; margin: 0 0 10px 0;">Your Original Request:</p>
                                <p style="color: #64748b; font-size: 14px; line-height: 1.6; margin: 0; background-color: #f8fafc; padding: 15px; border-radius: 8px;">{{ $quote->message }}</p>
                            </div>
                            
                            <!-- CTA -->
                            <div style="text-align: center; margin-top: 30px;">
                                <a href="tel:+971551018837" style="display: inline-block; background-color: #f7a400; color: #0d2d5a; padding: 14px 30px; border-radius: 50px; text-decoration: none; font-weight: 600; font-size: 14px;">
                                    Call Us: +971 55 101 8837
                                </a>
                            </div>
                        </td>
                    </tr>
                    
                    <!-- Footer -->
                    <tr>
                        <td style="background-color: #0d2d5a; padding: 25px 30px; text-align: center;">
                            <p style="color: rgba(255,255,255,0.8); font-size: 13px; margin: 0 0 10px 0;">
                                PureDropCleaning - Professional Building Cleaning Services LLC
                            </p>
                            <p style="color: rgba(255,255,255,0.6); font-size: 12px; margin: 0;">
                                Al Jafiliya, Dubai, UAE | info.puredropcleaning@gmail.com
                            </p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
