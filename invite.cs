using System;
using System.Collections;
using System.Collections.Generic;
using System.Text;
namespace Kwarta
{
    #region Invite
    public class Invite
    {
        #region Member Variables
        protected int _id;
        protected string _user;
        protected string _userInviter;
        protected unknown _inviteDate;
        protected string _status;
        protected string _inviteCode;
        #endregion
        #region Constructors
        public Invite() { }
        public Invite(string user, string userInviter, unknown inviteDate, string status, string inviteCode)
        {
            this._user=user;
            this._userInviter=userInviter;
            this._inviteDate=inviteDate;
            this._status=status;
            this._inviteCode=inviteCode;
        }
        #endregion
        #region Public Properties
        public virtual int Id
        {
            get {return _id;}
            set {_id=value;}
        }
        public virtual string User
        {
            get {return _user;}
            set {_user=value;}
        }
        public virtual string UserInviter
        {
            get {return _userInviter;}
            set {_userInviter=value;}
        }
        public virtual unknown InviteDate
        {
            get {return _inviteDate;}
            set {_inviteDate=value;}
        }
        public virtual string Status
        {
            get {return _status;}
            set {_status=value;}
        }
        public virtual string InviteCode
        {
            get {return _inviteCode;}
            set {_inviteCode=value;}
        }
        #endregion
    }
    #endregion
}