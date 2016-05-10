package biz.dtails.jason.dtailsllc;

import android.app.Activity;
import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.TextView;


/**
 * Created by Jason on 4/18/2016.
 */
public class LoginMain extends Activity {
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.loginmain);
        String username  = getIntent().getStringExtra("Username");

        TextView tv = (TextView)findViewById(R.id.TVusername);
        tv.setText(username);
    }

    public void onButtonClick(View v) {
        Intent i = new Intent(LoginMain.this, Reserve.class);
        startActivity(i);
    }

    public void onButtonClick2(View v) {
        Intent i = new Intent(LoginMain.this, Reservations.class);
        startActivity(i);
    }

}
