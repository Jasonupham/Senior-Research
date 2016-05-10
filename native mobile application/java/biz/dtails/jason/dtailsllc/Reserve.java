package biz.dtails.jason.dtailsllc;

import android.app.Activity;
import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.EditText;


/**
 * Created by Jason on 4/18/2016.
 */
public class Reserve extends Activity {
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.reserve);
    }


    public void onButtonClick(View v) {


        Intent i = new Intent(Reserve.this, LoginMain.class);
        startActivity(i);
    }

    public void onSubmitButtonClick(View v) {
        EditText a = (EditText)findViewById(R.id.TFrev1);
        String str1 = a.getText().toString();

        Intent i = new Intent(Reserve.this, Reservations.class);
        i.putExtra("RevTime1", str1);
        startActivity(i);

        EditText b = (EditText)findViewById(R.id.TFrev2);
        String str2 = b.getText().toString();

        Intent z = new Intent(Reserve.this, Reservations.class);
        z.putExtra("RevTime2",str2);
        startActivity(z);
    }
}
