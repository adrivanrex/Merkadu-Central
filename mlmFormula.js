member1 = {
	username: "adrivan",
	id: 1,
	sponsor: 0,
	placement: "left",
	points: 90

};

member2 = {
	username: "rex",
	id:2,
	sponsor: 1,
	placementSponsorID: 1,
	placement: "left",
	points: 90,
}



membershipFee = 8880;
referalPrecentage = 5.6;

function newMember(membershipFee,id,sponsorID,placementID,placement){


}


function referalPercentage(membershipFee,amount){
	percentage = amount/membershipFee*100;
	return percentage;
}

function referalFee(membershipFee,referalPercentage){
	referalPercentage = Number(referalPercentage);
	percent = referalPercentage/100;
	referalFormula = membershipFee*percent;
	referalFee = referalFormula;
	return referalFee;

}



/**
function percentTodecimal(percent){
	
	decimal = percent/100;
	return decimal;

};
**/


referalFee(membershipFee,referalPrecentage);




